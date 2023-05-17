<?php

namespace Codilar\CustomTable\Model\Config\Source;

class RecordsToDisplay implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        for ($i = 0; $i <= 25; $i += 1) {
            $options[] = [
                'value' => $i,
                'label' => $i
            ];
        }
        return $options;
    }
}
