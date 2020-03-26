<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("用户不存在")
     */
    const MOBILE_NO_EXIST = 100000;

    /**
     * @Message("手机号不能为空")
     */
    const MOBILE_NULL = 100001;

    /**
     * @Message("密码不能为空")
     */
    const PASSWORD_NO_EXIST = 100002;

    /**
     * @Message("密码错误")
     */
    const PASSWORD_ERROR = 100003;
}
