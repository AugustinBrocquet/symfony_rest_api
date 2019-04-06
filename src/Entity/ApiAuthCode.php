<?php
namespace App\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="api_auth_codes")
 */
class ApiAuthCode extends BaseAuthCode
{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\ApiClient")
   * @ORM\JoinColumn(nullable=false)
   */
  protected $client;
  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\ApiUser")
   */
  protected $user;
}