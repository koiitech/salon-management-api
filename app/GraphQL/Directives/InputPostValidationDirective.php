<?php

namespace App\GraphQL\Directives;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class InputPostValidationDirective extends ValidationDirective
{
    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'title' => ["required"],
            'slug' => ["required", "unique:pages,slug," . ($this->args['id'] ?? null)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title' => 'Tiêu đề không được để trống',
            'slug' => 'Slug đã tồn tại, vui lòng chọn slug khác',
        ];
    }
}
