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

class RegistryServiceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Docker\\API\\Model\\RegistryServiceConfig';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\RegistryServiceConfig';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\RegistryServiceConfig();
        if (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && $data['AllowNondistributableArtifactsCIDRs'] !== null) {
            $values = [];
            foreach ($data['AllowNondistributableArtifactsCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setAllowNondistributableArtifactsCIDRs($values);
        } elseif (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && $data['AllowNondistributableArtifactsCIDRs'] === null) {
            $object->setAllowNondistributableArtifactsCIDRs(null);
        }
        if (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && $data['AllowNondistributableArtifactsHostnames'] !== null) {
            $values_1 = [];
            foreach ($data['AllowNondistributableArtifactsHostnames'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAllowNondistributableArtifactsHostnames($values_1);
        } elseif (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && $data['AllowNondistributableArtifactsHostnames'] === null) {
            $object->setAllowNondistributableArtifactsHostnames(null);
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data) && $data['InsecureRegistryCIDRs'] !== null) {
            $values_2 = [];
            foreach ($data['InsecureRegistryCIDRs'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setInsecureRegistryCIDRs($values_2);
        } elseif (\array_key_exists('InsecureRegistryCIDRs', $data) && $data['InsecureRegistryCIDRs'] === null) {
            $object->setInsecureRegistryCIDRs(null);
        }
        if (\array_key_exists('IndexConfigs', $data) && $data['IndexConfigs'] !== null) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['IndexConfigs'] as $key => $value_3) {
                $values_3[$key] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\IndexInfo', 'json', $context);
            }
            $object->setIndexConfigs($values_3);
        } elseif (\array_key_exists('IndexConfigs', $data) && $data['IndexConfigs'] === null) {
            $object->setIndexConfigs(null);
        }
        if (\array_key_exists('Mirrors', $data) && $data['Mirrors'] !== null) {
            $values_4 = [];
            foreach ($data['Mirrors'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setMirrors($values_4);
        } elseif (\array_key_exists('Mirrors', $data) && $data['Mirrors'] === null) {
            $object->setMirrors(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getAllowNondistributableArtifactsCIDRs()) {
            $values = [];
            foreach ($object->getAllowNondistributableArtifactsCIDRs() as $value) {
                $values[] = $value;
            }
            $data['AllowNondistributableArtifactsCIDRs'] = $values;
        }
        if (null !== $object->getAllowNondistributableArtifactsHostnames()) {
            $values_1 = [];
            foreach ($object->getAllowNondistributableArtifactsHostnames() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['AllowNondistributableArtifactsHostnames'] = $values_1;
        }
        if (null !== $object->getInsecureRegistryCIDRs()) {
            $values_2 = [];
            foreach ($object->getInsecureRegistryCIDRs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['InsecureRegistryCIDRs'] = $values_2;
        }
        if (null !== $object->getIndexConfigs()) {
            $values_3 = [];
            foreach ($object->getIndexConfigs() as $key => $value_3) {
                $values_3[$key] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['IndexConfigs'] = $values_3;
        }
        if (null !== $object->getMirrors()) {
            $values_4 = [];
            foreach ($object->getMirrors() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Mirrors'] = $values_4;
        }

        return $data;
    }
}
