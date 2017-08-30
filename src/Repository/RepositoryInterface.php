<?php

declare(struct_types = 1);

namespace PHPFin\Repository;

interface RepositoryInterface 
{
    public function all(): array;

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}

