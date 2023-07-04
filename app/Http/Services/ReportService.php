<?php

namespace App\Http\Services;

use App\Http\Requests\Report\ReportUpdateRequest;
use App\Models\Ingredient;
use App\Models\Report;
use App\Models\Restaurant;

class ReportService
{
    public function createReport(array $data): array
    {
        $report = Report::query()->create([
            'date' => $data['date'],
            'description' => $data['description'],
            'restaurant_id' => $data['restaurant_id']
        ]);

        $totalPurchaseAmount = 0;
        $countOfIngredients = 0;
        $ingredientsData = [];

        foreach ($data['ingredients'] as $ingredientData) {
            if (Ingredient::query()->where('id', $ingredientData['ingredient_id'])->exists()) {
                $ingredientsData[$ingredientData['ingredient_id']] = [
                    'sum_of_buying' => $ingredientData['sum_of_buying'],
                    'percent_of_effective' => $ingredientData['percent_of_effective'],
                    'weigh_in_gram' => $ingredientData['weigh_in_gram'],
                ];
                $totalPurchaseAmount += $ingredientData['sum_of_buying'];
                $countOfIngredients++;
            } else {
                abort(400);
            }

        }
        /** @var Report $report */
        $report->ingredients()->sync($ingredientsData);


        $report->update([
            'total_purchase_amount' => $totalPurchaseAmount,
            'count_of_ingredients' => $countOfIngredients,
        ]);
        return $report->toArray();
    }

    public function getReport(array $queryData)
    {
        if(Restaurant::query()->where('id',$queryData['restaurant_id'])->where('user_id', request()->user()->id)->exists()){
            $reports = Report::query()->where('restaurant_id', $queryData['restaurant_id'])->
            where('description', 'ILIKE', '%' . $queryData['description'] . '%')->get();
            $responseData = [];
            foreach ($reports as $report){

            }
        }


    }

    public function updateReport(array $data, Report $report): array
    {
        /** @var Report $report */
        $report->update([
            'date' => $data['date'],
            'description' => $data['description'],
            'restaurant_id' => $data['restaurant_id']
        ]);
        $totalPurchaseAmount = 0;
        $countOfIngredients = 0;
        $ingredientsData = [];

        foreach ($data['ingredients'] as $ingredientData) {
            if (Ingredient::query()->where('id', $ingredientData['id'])->exists()) {
                $ingredientsData[$ingredientData['id']] = [
                    'sum_of_buying' => $ingredientData['sum_of_buying'],
                    'percent_of_effective' => $ingredientData['percent_of_effective'],
                    'weigh_in_gram' => $ingredientData['weigh_in_gram'],
                ];
                $totalPurchaseAmount += $ingredientData['sum_of_buying'];
                $countOfIngredients++;
            } else {
                abort(400);
            }

        }
        $report->ingredients()->sync($ingredientsData);


        $report->update([
            'total_purchase_amount' => $totalPurchaseAmount,
            'count_of_ingredients' => $countOfIngredients,
        ]);
        return $report->toArray();
    }
}
