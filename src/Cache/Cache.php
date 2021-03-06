<?php
namespace CrmCareCloud\Webservice\RestApi\Client\SDK\Cache;
use Psr\Cache\CacheItemPoolInterface;

class Cache {
	private CacheItemPoolInterface $cacheItemPool;
	/** @var Rule[] $config  */
	private array $rules;

	public function __construct( CacheItemPoolInterface $cache_item_pool, array $rules = []) {
		$this->cacheItemPool = $cache_item_pool;
		$this->rules = $rules;
	}

	/**
	 * @return CacheItemPoolInterface
	 */
	public function getCacheItemPool(): CacheItemPoolInterface {
		return $this->cacheItemPool;
	}

	/**
	 * @return array
	 */
	public function getRules(): array {
		return $this->rules;
	}
}