<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'recibos';

    protected $fillable = [
        'cliente_id',
        'data',
        'preco_total_sem_iva',
        'iva',
        'preco_total_com_iva',
        'nif',
        'nome_cliente',
        'tipo_pagamento',
        'ref_pagamento',
        'recibo_pdf_url',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function bilhetes()
    {
        return $this->hasMany(Bilhete::class, 'recibo_id', 'id');
    }
}
