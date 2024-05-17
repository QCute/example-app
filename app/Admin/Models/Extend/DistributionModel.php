<?php

namespace App\Admin\Models\Extend;

use App\Admin\Database\DistributionConnection;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;

abstract class DistributionModel extends Model
{
    /**
     * The rules.
     *
     * @var array
     */
    private $rules = [];

    /**
     * Set the database page for the model.
     *
     * @return string
     */
    public function page(int $page = 0, int $perPage = 10): static
    {

        $this->foldPage = $page;

        $this->perPage = $perPage;

        return $this;
    }

    /**
     * Get the database connection for the model.
     *
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return new DistributionConnection($this->rules);
    }
}
