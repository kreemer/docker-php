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

class DeviceMappingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\DeviceMapping';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\DeviceMapping';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\DeviceMapping();
        if (\array_key_exists('PathOnHost', $data) && $data['PathOnHost'] !== null) {
            $object->setPathOnHost($data['PathOnHost']);
        } elseif (\array_key_exists('PathOnHost', $data) && $data['PathOnHost'] === null) {
            $object->setPathOnHost(null);
        }
        if (\array_key_exists('PathInContainer', $data) && $data['PathInContainer'] !== null) {
            $object->setPathInContainer($data['PathInContainer']);
        } elseif (\array_key_exists('PathInContainer', $data) && $data['PathInContainer'] === null) {
            $object->setPathInContainer(null);
        }
        if (\array_key_exists('CgroupPermissions', $data) && $data['CgroupPermissions'] !== null) {
            $object->setCgroupPermissions($data['CgroupPermissions']);
        } elseif (\array_key_exists('CgroupPermissions', $data) && $data['CgroupPermissions'] === null) {
            $object->setCgroupPermissions(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getPathOnHost()) {
            $data['PathOnHost'] = $object->getPathOnHost();
        }
        if (null !== $object->getPathInContainer()) {
            $data['PathInContainer'] = $object->getPathInContainer();
        }
        if (null !== $object->getCgroupPermissions()) {
            $data['CgroupPermissions'] = $object->getCgroupPermissions();
        }

        return $data;
    }
}
