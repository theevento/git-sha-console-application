<?php


namespace GitApi\Entity\Interfaces;


interface GitApiInterface
{
    const TYPE_POST = 'POST';
    const TYPE_GET = 'GET';
    const TYPE_HEAD = 'HEAD';
    const TYPE_PUT = 'PUT';
    const TYPE_DELETE = 'DELETE';
    const TYPE_CONNECT = 'CONNECT';
    const TYPE_OPTIONS = 'OPTIONS';

    public function getApiUrl(): string;
    public function getRequestType(): string;
    public function getData(): array;
    public function getHeaders(): array;
}