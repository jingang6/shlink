<?php
declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Shlinkio\Shlink\Common\Entity\AbstractEntity;
use function array_key_exists;

/**
 * Class VisitLocation
 * @author
 * @link
 *
 * @ORM\Entity()
 * @ORM\Table(name="visit_locations")
 */
class VisitLocation extends AbstractEntity implements JsonSerializable
{
    /**
     * @var string
     * @ORM\Column(nullable=true, name="country_code")
     */
    private $countryCode;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="country_name")
     */
    private $countryName;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="region_name")
     */
    private $regionName;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="city_name")
     */
    private $cityName;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="latitude")
     */
    private $latitude;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="longitude")
     */
    private $longitude;
    /**
     * @var string
     * @ORM\Column(nullable=true, name="timezone")
     */
    private $timezone;

    public function __construct(array $locationInfo)
    {
        $this->exchangeArray($locationInfo);
    }

    public function getCountryName(): string
    {
        return $this->countryName ?? '';
    }

    public function getLatitude(): string
    {
        return $this->latitude ?? '';
    }

    public function getLongitude(): string
    {
        return $this->longitude ?? '';
    }

    public function getCityName(): string
    {
        return $this->cityName ?? '';
    }

    /**
     * Exchange internal values from provided array
     */
    private function exchangeArray(array $array): void
    {
        if (array_key_exists('country_code', $array)) {
            $this->countryCode = (string) $array['country_code'];
        }
        if (array_key_exists('country_name', $array)) {
            $this->countryName = (string) $array['country_name'];
        }
        if (array_key_exists('region_name', $array)) {
            $this->regionName = (string) $array['region_name'];
        }
        if (array_key_exists('city', $array)) {
            $this->cityName = (string) $array['city'];
        }
        if (array_key_exists('latitude', $array)) {
            $this->latitude = (string) $array['latitude'];
        }
        if (array_key_exists('longitude', $array)) {
            $this->longitude = (string) $array['longitude'];
        }
        if (array_key_exists('time_zone', $array)) {
            $this->timezone = (string) $array['time_zone'];
        }
    }

    public function jsonSerialize(): array
    {
        return [
            'countryCode' => $this->countryCode,
            'countryName' => $this->countryName,
            'regionName' => $this->regionName,
            'cityName' => $this->cityName,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'timezone' => $this->timezone,
        ];
    }
}
