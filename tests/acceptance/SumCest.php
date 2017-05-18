<?php
class SumCest
{
    public function _before(\AcceptanceTester $I)
    {
    }

    public function _after(\AcceptanceTester $I)
    {
    }

    
    public function countSumEvenT001(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '3');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '2', '3');
        $sumpage->countSum('6');
        $sumpage->isEvenNumber(TRUE);
    }

    public function countSumOddT002(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '4');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '2', '4');
        $sumpage->countSum('7');
        $sumpage->isEvenNumber(FALSE);
    }

    public function lettersT003(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('a', '2', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function lettersT004(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', 'a', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function lettersT005(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', 'a');
        $sumpage->checkValidation(FALSE);
    }

    public function specialCharactersT006(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('!"№%:,.;()-=_+/?><@\'\|', '2', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function specialCharactersT007(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '!"№%:,.;()-=_+/?><@\'\|', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function specialCharactersT008(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '!"№%:,.;()-=_+/?><@\'\|');
        $sumpage->checkValidation(FALSE);
    }

    public function emptyFieldT009(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('', '2', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function emptyFieldT010(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '', '3');
        $sumpage->checkValidation(FALSE);
    }

    public function emptyFieldT011(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '');
        $sumpage->checkValidation(FALSE);
    }

    public function countSumZeroT012(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('0', '2', '3');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('0', '2', '3');
        $sumpage->countSum('5');
    }

    public function countSumZeroT013(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '0', '3');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '0', '3');
        $sumpage->countSum('4');
    }

    public function countSumZeroT014(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '0');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '2', '0');
        $sumpage->countSum('3');
    }

    public function countSumMaxT015(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('999999999', '2', '3');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('999999999', '2', '3');
        $sumpage->countSum('1000000004');
    }

    public function countSumMaxT016(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '999999999', '3');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '999999999', '3');
        $sumpage->countSum('1000000003');
    }

    public function countSumMaxT017(\AcceptanceTester $I, \Page\Login $loginpage, \Page\Sum $sumpage)
    {
        $loginpage->signIn('WQA', '12345');
        $sumpage->enterValues('1', '2', '999999999');
        $sumpage->checkValidation(TRUE);
        $sumpage->checkValues('1', '2', '999999999');
        $sumpage->countSum('1000000002');
    }
}