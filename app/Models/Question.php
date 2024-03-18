<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    private static $questions = [
        1 => [
            'id' => 1,
            'text' => 'Estão no carro?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => null
        ],
        2 => [
            'id' => 2,
            'text' => 'Tem gente dentro do carro?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 1
        ],
        3 => [
            'id' => 3,
            'text' => 'O carro está em movimento?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => null
        ],
        4 => [
            'id' => 4,
            'text' => 'O motorista está usando cinto de segurança?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 1
        ],
        5 => [
            'id' => 5,
            'text' => 'Há bagagens no porta-malas?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => null
        ],
        6 => [
            'id' => 6,
            'text' => 'O carro está estacionado?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 1
        ],
        7 => [
            'id' => 7,
            'text' => 'Você é o motorista?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 1
        ],
        8 => [
            'id' => 8,
            'text' => 'O carro está em bom estado de conservação?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => null
        ],
        9 => [
            'id' => 9,
            'text' => 'Você é o proprietário do veículo?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 7 
        ],
        10 => [
            'id' => 10,
            'text' => 'O carro está estacionado em local permitido?',
            'options' => ['Sim', 'Não'],
            'dependsOn' => 6
        ]
    ];

    public static function allQuestions()
    {
        return self::$questions;
    }

    public static function getQuestionById($id)
    {
        return self::$questions[$id] ?? null;
    }
}
