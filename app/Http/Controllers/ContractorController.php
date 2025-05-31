<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Dtos\Contractor\PersonalDataDto;
use App\Dtos\Contractor\UserAddressDto;
use App\Dtos\User\UserStoreDto;
use App\Http\Resources\UserResource;
use App\Services\User\CreateUserService;
use Illuminate\Http\JsonResponse;
use Throwable;

final class ContractorController extends BaseController
{
    public function __construct(){}

    public function storePersonalData(PersonalDataDto $requestData): JsonResponse
    {
        // This method is intended to handle personal data onboarding for contractors.
        // Implementation details would go here.
        try {
            $user = (new CreateUserService())->create($requestData);
            return response()->json(new UserResource($user), 201);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function storeAddress(UserAddressDto $requestData): JsonResponse
    {
        
    }
}
