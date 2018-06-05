<?php


namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessRule;
use yii\i18n\Formatter;

class FormatterComponent extends Formatter
{

    private $_intlLoaded = false;


    public function asCurrency($value, $currency=null, $options=[], $textOptions=[])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        $value = $this->normalizeNumericValue($value);

        if ($this->_intlLoaded) {
            $currency = $currency ?: $this->currencyCode;
            // currency code must be set before fraction digits
            // http://php.net/manual/en/numberformatter.formatcurrency.php#114376
            if ($currency && !isset($textOptions[NumberFormatter::CURRENCY_CODE])) {
                $textOptions[NumberFormatter::CURRENCY_CODE] = $currency;
            }

            $formatter = $this->createNumberFormatter(NumberFormatter::CURRENCY, null, $options, $textOptions);
            if ($currency === null) {
                $result = $formatter->format($value);
            } else {
                $result = $formatter->formatCurrency($value, $currency);
            }

            if ($result === false) {
                throw new InvalidParamException('Formatting currency value failed: '.$formatter->getErrorCode().' '.$formatter->getErrorMessage());
            }

            return $result;
        } else {
            if ($currency === null) {
                if ($this->currencyCode === null) {
                    throw new InvalidConfigException('The default currency code for the formatter is not defined and the php intl extension is not installed which could take the default currency from the locale.');
                }

                $currency = $this->currencyCode;
            }

            return $currency.''.$this->asDecimal($value, 2, $options, $textOptions);
        }//end if

    }//end asCurrency()


    public function asInteger($value, $options=[], $textOptions=[])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        $value = $this->normalizeNumericValue($value);
        if ($this->_intlLoaded) {
            $f = $this->createNumberFormatter(NumberFormatter::DECIMAL, null, $options, $textOptions);
            $f->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
            if (($result = $f->format($value, NumberFormatter::TYPE_INT64)) === false) {
                throw new InvalidParamException('Formatting integer value failed: '.$f->getErrorCode().' '.$f->getErrorMessage());
            }

            return $result;
        } else {
            return number_format($value, 0, $this->decimalSeparator, $this->thousandSeparator);
        }

    }//end asInteger()


}//end class
