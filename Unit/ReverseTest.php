<?php
use PHPUnit\Framework\TestCase;


class ReverseTest extends TestCase
{

    public function testRussiaLangPunctuationMarks(): void
    {
        $this->assertEquals(
            "Тевирп! Онвад ен ьсиледив.",
            Reverser::revertCharacters("Привет! Давно не виделись.")
        );
    }

    public function testRussiaLangTwoCapitalSing(): void
    {
        $this->assertEquals(
            "ТЕвирп! Онвад ен ьсиледив.",
            Reverser::revertCharacters("ПРивет! Давно не виделись.")
        );
    }

    public function testRussiaLangAndEngLag(): void
    {
        $this->assertEquals(
            "ТЕвирп! Онвад ен ьcиледив.",
            Reverser::revertCharacters("ПРивет! Давно не виделиcь.")
        );
    }

    public function testTwoPunctuationMarkInARRow(): void
    {
        $this->assertEquals(
            "Тевирп!! Онвад ен ьсиледив.",
            Reverser::revertCharacters("Привет!! Давно не виделись.")
        );
    }

    public function testSpaceInStart(): void
    {
        $this->assertEquals(
            " Тевирп! Онвад ен ьсиледив.",
            Reverser::revertCharacters(" Привет! Давно не виделись.")
        );
    }


    public function testPunctuationMarkBetweenTwoSpace(): void
    {
        $this->assertEquals(
            "Тевирп ! Онвад ен ьсиледив.",
            Reverser::revertCharacters("Привет ! Давно не виделись.")
        );
    }


}

