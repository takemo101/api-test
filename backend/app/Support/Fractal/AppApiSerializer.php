<?php

namespace App\Support\Fractal;

use League\Fractal\Serializer\ArraySerializer;

/**
 * Fractalでデータを本システム向けにシリアライズするための
 * カスタムクラス
 */
final class AppApiSerializer extends ArraySerializer
{
    /**
     * リソースのキーをない状態にするための識別キー
     *
     * @var string
     */
    public const EmptyResourceKey = '--';

    /**
     * {@inheritDoc}
     */
    public function collection(?string $resourceKey, array $data): array
    {
        if ($resourceKey === self::EmptyResourceKey) {
            return $data;
        }

        return [$resourceKey ?: 'data' => $data];
    }
}
