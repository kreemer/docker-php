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

class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\Port';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Port';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Port();
        if (\array_key_exists('IP', $data) && $data['IP'] !== null) {
            $object->setIP($data['IP']);
        } elseif (\array_key_exists('IP', $data) && $data['IP'] === null) {
            $object->setIP(null);
        }
        if (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] !== null) {
            $object->setPrivatePort($data['PrivatePort']);
        } elseif (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] === null) {
            $object->setPrivatePort(null);
        }
        if (\array_key_exists('PublicPort', $data) && $data['PublicPort'] !== null) {
            $object->setPublicPort($data['PublicPort']);
        } elseif (\array_key_exists('PublicPort', $data) && $data['PublicPort'] === null) {
            $object->setPublicPort(null);
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
        } elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getIP()) {
            $data['IP'] = $object->getIP();
        }
        if (null !== $object->getPrivatePort()) {
            $data['PrivatePort'] = $object->getPrivatePort();
        }
        if (null !== $object->getPublicPort()) {
            $data['PublicPort'] = $object->getPublicPort();
        }
        if (null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }

        return $data;
    }
}