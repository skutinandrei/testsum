<?php
namespace Page;

class Sum
{
    public static $firstValueInput = ['id' => 'value1'];
    public static $secondValueInput = ['id' => 'value2'];
    public static $thirdValueInput = ['id' => 'value3'];
    public static $nextButtonDisabled = ['xpath' => '//input[@ng-click="vm.next()" and @disabled="disabled"]'];
    public static $nextButtonEnabled = ['xpath' => '//input[@ng-click="vm.next()" and not(@disabled="disabled")]'];
    public static $checkFirstValue = ['xpath' => '//tr[1]/td'];
    public static $checkSecondValue = ['xpath' => '//tr[2]/td'];
    public static $checkThirdValue = ['xpath' => '//tr[3]/td'];
    public static $checkValuesForm = ['xpath' => '//div[@ng-if="vm.steps[1]"]'];
    public static $resultTable = ['xpath' => '//div[@ng-if="vm.steps[3]"]'];
    public static $sumResultInput = ['xpath' => '//tr[4]/td'];
    public static $sumResultEven = ['xpath' => '//tr[4][@class="bg-success"]'];
    
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function enterValues($firstValue, $secondValue, $thirdValue)
    {
    	$I = $this->tester;

        $I->fillField(self::$firstValueInput, $firstValue);
        $I->fillField(self::$secondValueInput, $secondValue);
        $I->fillField(self::$thirdValueInput, $thirdValue);
    }

    public function checkValidation($valid)
    {
        $I = $this->tester;

        if ($valid === TRUE) {
            $I->seeElement(self::$nextButtonEnabled);
        }
        else {
            $I->seeElement(self::$nextButtonDisabled);   
        }
    }

    public function checkValues($firstValue, $secondValue, $thirdValue)
    {
        $I = $this->tester;

        $I->click(self::$nextButtonEnabled);
        $I->waitForElement(self::$checkValuesForm, 10);
        $I->waitForElementVisible(self::$checkFirstValue, 5);
        $first = $I->grabTextFrom(self::$checkFirstValue);
        $second = $I->grabTextFrom(self::$checkSecondValue);
        $third = $I->grabTextFrom(self::$checkThirdValue);
        $I->assertEquals($first, $firstValue);
        $I->assertEquals($second, $secondValue);
        $I->assertEquals($third, $thirdValue);
    }

    public function countSum($sumExpected)
    {
        $I = $this->tester;

        $I->click(self::$nextButtonEnabled);
        $I->waitForElement(self::$resultTable, 15);
        $I->waitForElementVisible(self::$sumResultInput, 5);
        $sumResult = $I->grabTextFrom(self::$sumResultInput);
        $I->assertEquals($sumResult, $sumExpected);
    }

    public function isEvenNumber($even)
    {
        $I = $this->tester;

        if ($even === TRUE) {
            $I->seeElement(self::$sumResultEven);
        }
        else {
            $I->dontSeeElement(self::$sumResultEven);
        }
    }
}