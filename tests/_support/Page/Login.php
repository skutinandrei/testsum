<?php
namespace Page;

class Login
{
    public static $loginButton = ['xpath' => '//a[@ng-href="/qa/login"]'];
    public static $loginForm = ['xpath' => '//form[@ng-submit="vm.login()"]'];
    public static $loginInput = ['id' => 'username'];
    public static $passwordInput = ['id' => 'password'];
    public static $submitButton = ['xpath' => '//button[@type="submit"]'];
    public static $formSum = ['name' => 'formSum'];

    protected $tester; 

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function signIn($login, $password)
    {
    	$I = $this->tester;

    	$I->amOnPage('/');
        $I->waitForElement(self::$loginButton, 10);
        $I->click(self::$loginButton);
    	$I->waitForElement(self::$loginForm, 10);
    	$I->fillField(self::$loginInput, $login);
    	$I->fillField(self::$passwordInput, $password);
    	$I->click(self::$submitButton);
    	$I->waitForElement(self::$formSum, 10);
    }
}
