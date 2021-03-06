<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PluginInterfaceTypeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\PluginInterfaceType';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\PluginInterfaceType';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PluginInterfaceType();
        if (\array_key_exists('Prefix', $data) && $data['Prefix'] !== null) {
            $object->setPrefix($data['Prefix']);
        } elseif (\array_key_exists('Prefix', $data) && $data['Prefix'] === null) {
            $object->setPrefix(null);
        }
        if (\array_key_exists('Capability', $data) && $data['Capability'] !== null) {
            $object->setCapability($data['Capability']);
        } elseif (\array_key_exists('Capability', $data) && $data['Capability'] === null) {
            $object->setCapability(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($data['Version']);
        } elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getPrefix()) {
            $data['Prefix'] = $object->getPrefix();
        }
        if (null !== $object->getCapability()) {
            $data['Capability'] = $object->getCapability();
        }
        if (null !== $object->getVersion()) {
            $data['Version'] = $object->getVersion();
        }

        return $data;
    }
}
