<?php
/**
 * GeneratorInterface.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms of the
 * Creative Commons Attribution-ShareAlike 4.0 International License.
 *
 * See the LICENSE file for details.
 */

declare(strict_types = 1);

namespace FireflyIII\Generator\Chart\Basic;

/**
 * Interface GeneratorInterface
 *
 * @package FireflyIII\Generator\Chart\Basic
 */
interface GeneratorInterface
{
    /**
     * Will generate a Chart JS compatible array from the given input. Expects this format:
     *
     * 0: [
     *    'label' => 'label of set',
     *    'entries' =>
     *        [
     *         'label-of-entry' => 'value'
     *        ]
     *    ]
     * 1: [
     *    'label' => 'label of another set',
     *    'entries' =>
     *        [
     *         'label-of-entry' => 'value'
     *        ]
     *    ]
     *
     *
     * @param array $data
     *
     * @return array
     */
    public function multiSet(array $data): array;

}