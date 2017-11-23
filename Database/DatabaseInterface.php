<?php

namespace Database;


interface DatabaseInterface
{
    public function prepare(string $query): StatementInterface;

    public function getLastError(): array;
}