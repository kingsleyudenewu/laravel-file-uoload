<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporting_region')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('upc')->nullable();
            $table->string('grid')->nullable();
            $table->string('isrc')->nullable();
            $table->string('custom_id_1')->nullable();
            $table->string('custom_id_2')->nullable();
            $table->string('custom_id_3')->nullable();
            $table->string('custom_id_4')->nullable();
            $table->string('google_id')->nullable();
            $table->string('artist')->nullable();
            $table->string('product_title')->nullable();
            $table->string('container_title')->nullable();
            $table->string('content_provider')->nullable();
            $table->string('label')->nullable();
            $table->string('consumer_country')->nullable();
            $table->string('device_type')->nullable();
            $table->string('product_type')->nullable();
            $table->string('interaction_type')->nullable();
            $table->string('total_play')->nullable();
            $table->string('partner_revenue_paid')->nullable();
            $table->string('partner_revenue_currency')->nullable();
            $table->string('eur_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_uploads');
    }
}
