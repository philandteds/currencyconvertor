<?php

class ToUSDOperator
{
    /*!
      Constructor, does nothing by default.
    */
    function __construct()
    {
    }

    /*!
     \return an array with the template operator name.
    */
    function operatorList()
    {
        return array( 'to_usd' );
    }

    /*!
     \return true to tell the template engine that the parameter list exists per operator type,
             this is needed for operator classes that have multiple operators.
    */
    function namedParameterPerOperator()
    {
        return true;
    }

    /*!
     See eZTemplateOperator::namedParameterList
    */
    function namedParameterList()
    {
        return array();
    }


    function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters, $placement )
    {
        switch ( $operatorName )
        {
            case 'to_usd':
            {
              $usdConverter = new CurrencyConvert();
              $operatorValue = $usdConverter->toUSD($operatorValue);
            } break;
        }
    }
}

?>