# TikTok responses

Live profile responses were checked on 2026-10-25. The profile payload is in `tiktok`. This shortened sample illustrates the envelope; it is not an exhaustive response contract:

```json
{
  "status": "ok",
  "tiktok": {
    "user": {
      "unique_id": "therock"
    }
  }
}
```

Fields can be absent or null. Successful HTTP 200 responses can carry API/application failures; check `status`, `rate_limit_reached` when present, and product-specific metadata. Cached replies may omit quota fields. Unknown upstream fields are preserved.

IDs should remain strings in application code. Never turn a large platform ID into a floating-point number. API response bodies are not logged by the SDK.
