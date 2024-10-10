<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

 'accepted' => 'يجب قبول حقل :attribute.',
'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other هو :value.',
'active_url' => 'يجب أن يكون حقل :attribute عنوان URL صالحًا.',
'after' => 'يجب أن يكون حقل :attribute تاريخًا بعد :date.',
'after_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا بعد أو يساوي :date.',
'alpha' => 'يجب أن يحتوي حقل :attribute على أحرف فقط.',
'alpha_dash' => 'يجب أن يحتوي حقل :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
'alpha_num' => 'يجب أن يحتوي حقل :attribute على أحرف وأرقام فقط.',
'array' => 'يجب أن يكون حقل :attribute مصفوفة.',
'ascii' => 'يجب أن يحتوي حقل :attribute على أحرف ورموز أبجدية رقمية أحادية البايت فقط.',
'before' => 'يجب أن يكون حقل :attribute تاريخًا قبل :date.',
'before_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا قبل أو يساوي :date.',
'between' => [
'array' => 'يجب أن يحتوي حقل :attribute على بين :min و :max عناصر.',
'file' => 'يجب أن يكون حقل :attribute بين :min و :max كيلوبايت.',
'numeric' => 'يجب أن يكون حقل :attribute بين :min و :max.',
'string' => 'يجب أن يكون حقل :attribute بين :min و :max حرف.',
],

    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأً.',
'can' => 'يحتوي حقل :attribute على قيمة غير مصرح بها.',
'confirmed' => 'تأكيد حقل :attribute غير متطابق.',
'current_password' => 'كلمة المرور غير صحيحة.',
'date' => 'يجب أن يكون حقل :attribute تاريخًا صالحًا.',
'date_equals' => 'يجب أن يكون حقل :attribute تاريخًا يساوي :date.',
'date_format' => 'يجب أن يتطابق حقل :attribute مع التنسيق :format.',
'decimal' => 'يجب أن يحتوي حقل :attribute على :decimal من الأرقام العشرية.',
'declined' => 'يجب رفض حقل :attribute.',
'declined_if' => 'يجب رفض حقل :attribute عندما يكون :other :value.',
'different' => 'يجب أن يكون حقل :attribute و :other مختلفين.',
'digits' => 'يجب أن يكون حقل :attribute عبارة عن :digits أرقام.',
'digits_between' => 'يجب أن يكون حقل :attribute بين :min و :max أرقام.',
'dimensions' => 'يحتوي حقل :attribute على أبعاد صورة غير صالحة.',
'distinct' => 'يحتوي حقل :attribute على قيمة مكررة.',
'doesnt_end_with' => 'يجب ألا ينتهي حقل :attribute بأحد القيم التالية: :values.',
'doesnt_start_with' => 'يجب ألا يبدأ حقل :attribute بأحد القيم التالية: :values.',
'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالح.',
'ends_with ...doesnt_end_with' => 'يجب ألا ينتهي حقل :attribute بأحد القيم التالية: :values.',
'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالح.',
'ends_with' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالح.',
'ends_with' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالح.',
'ends_with' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالح.',
'doesnt_start_with' => 'يجب ألا ينتهي حقل :attribute بأحد القيم التالية: :values.',
'email' => 'يجب أن يكون يجب أن ينتهي حقل :attribute بأحد الامتدادات التالية: :values.',
'enum' => 'The selected :attribute is valid.',
'exists' => 'The selected :attribute is valid.',
'extensions' => 'The :attribute must have one of the following extensions: :values.',
'file' => 'The :attribute must be a file.',
'filled' => 'The :attribute must have a value.',
'gt' => [
'array' => 'The :attribute must have more than :value items.',
'file' => 'The :attribute field must be greater than :value كيلوبايت.',
'numeric' => 'The :attribute field must be greater than :value.',
'string' => 'The :attribute field must be greater than :value character.',
],
    'gte' => [
'array' => 'يجب أن يحتوي حقل :attribute على عناصر :value أو أكثر.',
'file' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي كيلوبايت :value.',
'numeric' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value.',
'string' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي أحرف :value.',
],
'hex_color' => 'يجب أن يكون حقل :attribute لونًا سداسي عشريًا صالحًا.',
'image' => 'يجب أن يكون حقل :attribute صورة.',
'in' => 'السمة المحددة :attribute غير صالحة.',
'in_array' => 'يجب أن يكون حقل :attribute موجودًا في :other.',
'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
'ip' => 'يجب أن يكون حقل :attribute عنوان IP صالحًا.',
'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صالحًا.',
'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صالحًا.',
'json' => 'يجب أن يكون حقل :attribute سلسلة JSON صالحة.',
'lowercase' => 'يجب أن يكون حقل :attribute بأحرف صغيرة.',
'lt' => [
'array' => 'يجب أن يحتوي حقل :attribute على عناصر أقل من :value.',
'file' => 'يجب أن يكون حقل :attribute أقل من :value كيلوبايت.',
'numeric' => 'يجب أن يكون حقل :attribute أقل من :value.',
'string' => 'يجب أن يكون حقل :attribute أقل من :value أحرف.',
],
'lte' => [
'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :value عناصر.',
'file' => 'يجب ألا يكون حقل :attribute أقل من أو يساوي :value كيلوبايت.',
'numeric' => 'يجب ألا يكون حقل :attribute أقل من أو يساوي :value.',
'string' => 'يجب ألا يكون حقل :attribute أقل من أو يساوي :value أحرف.',
],
'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC صالح.',
'max' => [
'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عناصر.',
'file' => 'يجب ألا يكون حقل :attribute أكبر من :max كيلوبايت.',
'numeric' => 'يجب ألا يكون حقل :attribute أكبر من :max.',
'string' => 'يجب ألا يكون حقل :attribute أكبر من أكثر من :max أحرف.',
],
'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max أرقام.',
'mimes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
'mimetypes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
'min' => [
'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عناصر.',
'file' => 'يجب أن يكون حقل :attribute على الأقل على :min كيلوبايت.',
'numeric' => 'يجب أن يكون حقل :attribute على الأقل على :min.',
'string' => 'يجب أن يكون حقل :attribute على الأقل على :min أحرف.',
],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على الأقل على :min digits.',
'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other هو :value.',
'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا ما لم يكن :other هو :value.',
'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values ​​موجودًا.',
'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عندما تكون :values ​​موجودة.',
'multiple_of' => 'يجب أن يكون حقل :attribute مضاعفًا لـ :value.',
'not_in' => 'السمة المحددة غير صالحة.',
'not_regex' => 'تنسيق حقل :attribute هو غير صالح.',
'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
'password' => [
'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
'mixed' => 'يجب أن يحتوي حقل :attribute على حرف كبير واحد وحرف صغير واحد على الأقل.',
'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
'uncompromised' => 'ظهرت :attribute المحددة في تسريب بيانات. يرجى اختيار سمة مختلفة.',
],
'present' => 'يجب أن يكون حقل :attribute موجودًا.',
'present_if' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :other هو :value.',
'present_unless' => 'يجب أن يكون حقل :attribute موجودًا ما لم يكن :other هو :value.',
'present_with' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :values ​​موجودًا.',
'present_with_all' => 'يجب أن يكون حقل :attribute موجودًا عندما تكون :values ​​موجودة.',
'prohibited' => 'حقل :attribute محظور.',
'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
'prohibited_unless' => 'حقل :attribute محظور ما لم يكن :other في :values.',
'prohibits' => 'لا يمكن استخدام حقل :attribute.',
'prohibits ...ts_unless' => 'لا يمكن استخدام حقل :attribute.',
'prohibits_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
'prohibits_unless' => 'لا يمكن استخدام حقل :attribute.',
'prohibits_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
'prohibits_unless' => 'لا يمكن استخدام حقل :attribute :يمنع حقل السمة وجود :other.',
'regex' => 'تنسيق حقل السمة :attribute غير صالح.',
'required' => 'حقل السمة :attribute مطلوب.',
'required_array_keys' => 'يجب أن يحتوي حقل السمة :attribute على إدخالات لـ: :values.',
'required_if' => 'حقل السمة :attribute مطلوب عندما يكون :other هو :value.',
'required_if_accepted' => 'حقل السمة :attribute مطلوب عندما يتم قبول :other.',
'required_unless' => 'حقل السمة :attribute مطلوب ما لم يكن :other في :values.',
'required_with' => 'حقل السمة :attribute مطلوب عندما يكون :values ​​موجودًا.',
'required_with_all' => 'حقل السمة :attribute مطلوب عندما تكون :values ​​موجودة.',
'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values ​​موجودًا.',
'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values ​​موجودًا.',
'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
'size' => [
'array' => 'يجب أن يحتوي حقل :attribute على عناصر :size.',
'file' => 'يجب أن يكون حقل :attribute بحجم :size كيلوبايت.',
'numeric' => 'يجب أن يكون حقل :attribute بحجم :size.',
'string' => 'يجب أن يكون حقل :attribute بحجم :size أحرف.',
],
'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values.',
'string' => 'يجب أن يكون حقل :attribute سلسلة.',
'timezone' => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
'unique' => 'تم أخذ :attribute بالفعل.',
'uploaded' => 'فشل تحميل :attribute.',
'uppercase' => 'يجب أن يكون حقل :attribute بأحرف كبيرة.',
'url' => 'يجب أن يكون حقل :attribute عنوان URL صالح.',
'ulid' => 'يجب أن يكون حقل :attribute معرف ULID صالح.',
'uuid' => 'يجب أن يكون حقل :attribute معرف UUID صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
