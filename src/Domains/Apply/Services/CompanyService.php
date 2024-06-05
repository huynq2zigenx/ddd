<?php

namespace Domains\Apply\Services;

use Domains\Apply\Repositories\CompanyRepository;

class CompanyService
{
    public function __construct(
        private CompanyRepository $companyRepository
    )
    {}

    public function all()
    {
        $companies = $this->companyRepository->all();
    }

}
