<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;

class StoreFileRequest extends ParentIdBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->user();

        return array_merge(
            parent::rules(),
            [
                'files.*' => [
                    'required',
                    'file',
                    function ($attribute, $value, $fail) use ($user) {
                        // Check if the file's original name is unique in the database
                        $file = File::query()->where('name', $value->getClientOriginalName())
                            ->where('created_by', $user->id)
                            ->where('parent_id', $this->parent_id)
                            ->exists();

                        if ($file) {
                            $fail('File "' . $value->getClientOriginalName() . '" already exists.');
                        }
                    },
                ],
                'folder_name' => ['string'],
            ]
        );
    }
}
