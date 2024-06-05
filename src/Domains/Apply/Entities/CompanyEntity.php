<?php

namespace Domains\Apply\Entities;

use App\Models\Company;

class CompanyEntity
{
    public function __construct(
        public string $name,
        public null|string $logo,
        public null|string $industry,
        public null|string $description
    ) {
    }

    public static function fromEloquent(Company $company): CompanyEntity
    {
        return new CompanyEntity(
            name: $company->name,
            logo: $company->logo,
            industry: $company->industry,
            description: $company->description
        );
    }
}
