<?php
namespace Core\Interfaces;

interface IConfirmable
{
    public function confirm(string $url);
}