<?php
namespace App\Repositories;

interface ClienteRepositoryInterface
{
    /**
     * Get's a cliente by it's ID
     *
     * @param int
     */
    public function get($cliente_id);

    /**
     * Get's all clientes.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a cliente.
     *
     * @param int
     */
    public function delete($cliente_id);

    /**
     * Updates a cliente.
     *
     * @param int
     * @param array
     */
    public function update($cliente_id, array $cliente_data);

    public function create(array $cliente_data);



}