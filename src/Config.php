<?php

namespace CrmCareCloud\Webservice\RestApi\Client\SDK;

use CrmCareCloud\Webservice\RestApi\Client\SDK\Data\AuthTypes;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Data\Interfaces;
use Symfony\Contracts\Cache\CacheInterface;

class Config
{
    private string $project_uri;

    private string $login;

    private string $password;

    private string $external_app_id;

    private string $auth_type;

    private ?CacheInterface $cache;

    private ?string $token;

    /**
     * @var callable[]
     */
    private array $middlewares;

    private string $interface;

    /**
     * @param CacheInterface|null $cache
     * @param string|null $token
     * @param callable[] $middlewares
     */
    public function __construct(
        string $project_uri,
        string $login,
        string $password,
        string $external_app_id = '',
        string $auth_type = AuthTypes::DEFAULT_AUTH,
        string $interface = Interfaces::ENTERPRISE,
        CacheInterface $cache = null,
        string $token = null,
        array $middlewares = []
    ) {
        $this->project_uri = $project_uri;
        $this->login = $login;
        $this->password = $password;
        $this->external_app_id = $external_app_id;
        $this->auth_type = $auth_type;
        $this->cache = $cache;
        $this->token = $token;
        $this->middlewares = $middlewares;
        $this->interface = $interface;
    }

    /**
     * @return string
     */
    public function getProjectUri(): string
    {
        return $this->project_uri;
    }

    /**
     * @return Config
     */
    public function setProjectUri(string $project_uri): Config
    {
        $this->project_uri = $project_uri;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return Config
     */
    public function setLogin(string $login): Config
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return Config
     */
    public function setPassword(string $password): Config
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getExternalAppId(): string
    {
        return $this->external_app_id;
    }

    /**
     * @return Config
     */
    public function setExternalAppId(string $external_app_id): Config
    {
        $this->external_app_id = $external_app_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthType(): string
    {
        return $this->auth_type;
    }

    /**
     * @return Config
     */
    public function setAuthType(string $auth_type): Config
    {
        $this->auth_type = $auth_type;

        return $this;
    }

    /**
     * @return CacheInterface|null
     */
    public function getCache(): ?CacheInterface
    {
        return $this->cache;
    }

    public function setCache(?CacheInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return callable[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    /**
     * @param callable[] $middlewares
     */
    public function setMiddlewares(array $middlewares): void
    {
        $this->middlewares = $middlewares;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return $this->interface;
    }

    public function setInterface(string $interface): void
    {
        $this->interface = $interface;
    }
}
