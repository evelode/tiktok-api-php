# 2.0.3

- Complete all 54 endpoint examples with individual walkthroughs, captured output, real response excerpts and offline replay.
- Correct model mappings for scalar account IDs, video search results, live/ranking objects, story details and nested lists; align IDE getter hints.
- Add a responsive MCP announcement with desktop/mobile and light/dark variants.
- Validation: 54 response replays and CLI/error cases passed on PHP 8.3; all 51 full Postman success responses map and export; PHP 8.1 syntax checks passed.
- The three linked-account probes returned HTTP 404; their examples document the captured failures.

**Full changelog:** [2.0.2...2.0.3](https://github.com/evelode/tiktok-api-php/compare/2.0.2...2.0.3)

# 2.0.2

- Rewrite all 54 primary examples around named SDK methods and visible LazyJsonMapper model access, with focused getter chains for profiles, videos, comments, feeds and search.
- Share CLI setup, key validation, timeouts, application/quota checks and optional full JSON export; keep requests and model reads in the examples.
- Preserve all 54 full query-parameter CLI programs under `examples/endpoints/`. Top-level examples now use editable sample inputs and common CLI options; unsupported query flags point to the diagnostic programs.
- Document which payloads have typed nested models and which retain raw fields. Keep the short example paths as aliases.
- Test all primary examples offline with populated, missing and empty payloads, plus ID/cursor precision, full JSON preservation and CLI/error handling.

[Compare 2.0.1...2.0.2](https://github.com/evelode/tiktok-api-php/compare/2.0.1...2.0.2)

# 2.0.1

- Simplify onboarding while retaining the complete method and model guides.
- Link the separate TikTok MCP server and use numeric release names.

# 2.0.0

- Complete named access to 54 TikTok routes, plus `call()` and the existing fluent builder.
- Preserve positional signatures of existing methods; new methods accept query arrays.
- Fix accidental POST requests, URL query decoding, disabled TLS verification, credential debug output and undefined fallback errors.
- Authenticate custom builder requests automatically; reject absolute endpoint URLs and disable redirects.
- Add timeout/base URL configuration and injectable Guzzle client.
- Correct response status mapping and extend envelope/payload models.
- Use environment keys and correct autoloader paths in examples.
- Require PHP 8.1+ and only the extensions used by the HTTP client/model mapper. This raises the supported PHP minimum; use the prior release for legacy PHP runtimes.
