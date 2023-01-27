<?php

namespace App\Swaager\Credentials;

/**
 * @OA\Schema(
 *     title="Credential Model",
 *     @OA\Xml(
 *         name="Credential"
 *     )
 * )
 */
class CredentialModel {


    /**
     * @OA\Property(
     *      title="qrcode",
     *      description="CodeQr value",
     *      example="Koakdkvardnh19373JDJSJK72736YYSHJHJHDUY3676UJHD267ESJS"
     * )
     *
     * @var string
     */
    public $qrcode;
}
