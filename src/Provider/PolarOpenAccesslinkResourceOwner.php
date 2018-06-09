<?php
namespace League\OAuth2\Client\Provider;

class PolarOpenAccesslinkResourceOwner implements ResourceOwnerInterface
{
    /**
     * Raw response.
     *
     * @var array
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->response['polar-user-id'] ?: null;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return int|null
     */
    public function getMemberId()
    {
        return $this->response['member-id'] ?: null;
    }


    /**
     * Returns resource owner first name.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->response['first-name'] ?: null;
    }

    /**
     * Returns resource owner last name.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->response['last-name'] ?: null;
    }


    /**
     * Returns resource owner birth day.
     *
     * @return string|null
     */
    public function getBirthdate()
    {
        return $this->response['birthdate'] ?: null;
    }

    /**
     * Returns resource owner registration date.
     *
     * @return string|null
     */
    public function getRegistrationdate()
    {
        return $this->response['registration-date'] ?: null;
    }

    /**
     * Returns gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->response['gender'];
    }

    /**
     * Returns weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->response['weight'];
    }

    /**
     * Returns height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->response['height'];
    }

    /**
     * Returns all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}