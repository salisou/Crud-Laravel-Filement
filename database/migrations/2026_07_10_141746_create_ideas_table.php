<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * Creazione della tabella "ideas".
         * Ogni colonna è commentata per spiegare il suo scopo.
         */
        Schema::create('ideas', function (Blueprint $table) {

            // ID autoincrementale (primary key)
            $table->id();

            // Titolo dell'idea (stringa breve)
            $table->string('title');

            // Descrizione dell'idea (testo lungo)
            $table->text('description');

            // Stato dell'idea (pending, in_progress, completed)
            // Può essere collegato a un Enum come Status
            $table->string('status');

            $table->string('priority');
            
            // Categoria come stringa (es. "Business", "Tech")
            $table->string('category');


            // Relazione con la tabella categories
            // foreignId crea una colonna UNSIGNED BIGINT
            // constrained() cerca automaticamente la tabella "categories"
            // cascadeOnDelete → se elimini la categoria, elimina anche le idee collegate
            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // created_at e updated_at
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
