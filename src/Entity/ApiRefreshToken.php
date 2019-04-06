<?php

namespace App\Entity;
use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="api_refresh_tokens")
 */
class ApiRefreshToken extends BaseRefreshToken
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