<?php

declare(strict_types=1);

namespace App\Service;

class PaginateEntity
{
    public int $currentPage = 0;
    public int $limitRows = 0;
    public int $offset = 0;
    public int $countRows = 0;
    public int $totalLimit = 0;

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }
    public function setCurrentPage(int $currentPage): void
    {
        $this->currentPage = $currentPage;
    }
    public function getLimitRows(): int
    {
        return $this->limitRows;
    }
    public function setLimitRows(int $limitRows): void
    {
        $this->limitRows = $limitRows;
    }
    public function getOffset(): int
    {
        return $this->offset;
    }
    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }
    public function getCountRows(): int
    {
        return $this->countRows;
    }
    public function setCountRows(int $countRows): void
    {
        $this->countRows = $countRows;
    }
    public function getTotalLimit(): int
    {
        return $this->totalLimit;
    }
    public function setTotalLimit(int $totalLimit): void
    {
        $this->totalLimit = $totalLimit;
    }
    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}