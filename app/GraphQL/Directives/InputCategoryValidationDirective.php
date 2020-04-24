<?php

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class InputCategoryValidationDirective extends ValidationDirective
{
  /**
   * @return mixed[]
   */
  public function rules(): array
  {
    return [
      'name' => ["required"],
      'slug' => ["required", "unique:pages,slug," . ($this->args['id'] ?? null)],
    ];
  }

  /**
   * @return string[]
   */
  public function messages(): array
  {
    return [
      'name' => 'Tiêu đề không được để trống',
      'slug' => 'Slug đã tồn tại, vui lòng chọn slug khác',
    ];
  }
}
