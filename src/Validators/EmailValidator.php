<?php

namespace PHPCasts\Validators;

/**
 * 邮箱验证
 */
class EmailValidator extends ValidatorAbstract
{
    /**
     * the regular expression used to validate the attribute value.
     * @see http://www.regular-expressions.info/email.html
     *
     * @var string
     */
    public $pattern = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

    /**
     * 是否允许为空
     * meaning that if the attribute is empty, it is considered valid.
     *
     * @var bool
     */
    public $allowEmpty = true;

    /**
     * 验证
     *
     * @param string $field
     * @param array $data
     * @return bool|string
     */
    public function validator($field, array $data)
    {
        $value = isset($data[$field]) ? $data[$field] : null;
        if ($this->validatorValue($value)) {
            return true;
        }

        return $this->message('{fieldName}不是邮箱！', [
            '{fieldName}' => $this->getName($field),
        ]);
    }

    /**
     * 验证值
     *
     * @param $value
     * @return bool|string
     */
    protected function validatorValue($value)
    {
        if (!$value) {
            return $this->allowEmpty;
        }

        if (preg_match($this->pattern, $value)) {
            return true;
        }

        return false;
    }
}