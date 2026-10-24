# Configuration, errors and pagination

Default API base URL: **`https://tiktok.evelode.com`**. Configure `setBaseUrl()`, `setTimeout()` (seconds), `setCacheTimeout()`, and an injectable Guzzle `httpClient`. HTTPS is required except for explicit localhost test servers. Default timeout is 30 seconds.

This compatibility client does not retry automatically. Catch its existing HTTP exception classes and retry deliberately within your request budget.

The configured license key is sent using the API's `license_key` query parameter. It overrides per-request attempts to supply a different key. Redirects are disabled, TLS verification stays enabled, and transport errors do not include request URLs. Keep credential-bearing URLs out of your application and reverse-proxy logs.

## Errors, pagination and caching

Existing exceptions include `BadRequestException`, `ForbiddenException`, `NotFoundException`, `ProxyAuthException`, `TooManyRequestsException` and `NetworkException`. HTTP 200 alone is not application success: inspect `status` and any quota/product error fields. HTTP 403 can indicate an access restriction; 429 means you should wait or check the plan's limits.

Pagination is endpoint-specific. Pass a returned cursor unchanged to the next request, stop when `has_more` is false/0, and stop if a cursor repeats. Always set your own page/request budget. The SDK does not invent cursor fields or automatically spend your quota.

`cache_timeout=60` enables API-side caching for 60 seconds; `0` disables it. See the current product terms for quota treatment. The SDK does not cache responses locally.

Large IDs must remain strings in your application. Python preserves integer precision; JavaScript converts unsafe JSON integers to strings; PHP uses `JSON_BIGINT_AS_STRING`; Go provides `Decode()` with `json.Number`; Java returns response bytes for your chosen JSON library; C# exposes bytes and `JsonDocument`.
