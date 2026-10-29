# Lab-grown Diamond CVD — Complete Prioritized Backlog

**Snapshot:** 2026-10-29
**Linear project:** [Lab-grown Diamond CVD — Production & Growth Backlog](https://linear.app/mukund-ajmera/project/lab-grown-diamond-cvd-production-and-growth-backlog-6d514e2a04a1)
**Execution tracker:** Linear owns current status and issue relations. This repository document is the complete, detailed snapshot for Jules and other tools. Keep it synchronized when issue content changes.
**Requested branch copy:** [docs/BACKLOG.md on main](https://github.com/mukundajmera/labgrowndiamondcvd/blob/main/docs/BACKLOG.md); the same commit is also published to the default `master` branch.
**Coverage:** 39 issues (MUK-5 through MUK-43), all currently Backlog, unassigned, and without due dates. Priority counts: Urgent 10, High 26, Medium 3.

## How to use this backlog

- Read the issue’s full description, acceptance criteria, owner handoff, dependencies, and verification before starting work.
- Respect Linear’s **Blocked by** relations. Do not begin implementation against an unapproved platform, source tree, product model, data set, commercial promise, or external service.
- MUK-25 records the owner’s product/customer/platform decision. MUK-5 verifies the deployed site and host identity. MUK-6 establishes the authorized Next.js source if Next.js remains selected. These questions can be investigated in parallel; dependent implementation waits on the relevant decisions.
- WordPress findings in MUK-30 through MUK-34 are conditional on MUK-25 retaining/selecting that storefront. Next.js findings in MUK-35 through MUK-39 require MUK-25 to retain Next.js and MUK-6 to identify its authoritative source. Retarget or close affected issues only with an owner-approved disposition and verified outcome.
- Use synthetic fixtures and isolated sandboxes where specified. No task in this backlog authorizes production deployment, DNS changes, live payment, real-recipient email, or production-data testing by implication.
- Competitor examples are patterns for investigation. They do not prove this business’s demand, economics, rights, claims, or ability to fulfill a policy.

## Current evidence and boundaries — 2026-10-29

- A fresh public visit confirmed that the website root serves the Next.js CVD experience. The catalog displays sample inventory and explicit sample-data disclosures. The public inquiry page visibly rendered a Turnstile “For testing only” label. These observations confirm display behavior only; they do not prove the production widget secret, backend acceptance, or delivery configuration.
- Public visits to /shop/ and /engagement-rings/ resolve to /diamonds. This is current route behavior, not confirmation that those URLs’ original intent should be removed.
- The populated Next.js app is at D:\Projects\labgrowndiamondcvd and has no Git metadata. The Git checkout at D:\Projects Workspace\labgrowndiamondcvd is a separate WordPress/WooCommerce tree. The initial WordPress audit baseline was origin/master b993fc92544dd82970978d674b7364cf3ba66a52; current origin/master advanced through 7596d48c6b13b533a0fd5ce7c34c47877476862b and ac9c9e499d700a5c81642664a2ab2bf27dab8839. These add Technology, Contact, FAQ, Custom Jewelry templates/styles and a plugin health module. MUK-30–34 source paths were unchanged. All WordPress findings remain conditional/source-only until the owner selects that platform.
- The remote default branch is master. The existing main branch is an ancestor of master; publish the documentation commit to both main and master so the backlog is available from the requested branch and remains on the default branch. No WordPress or Next.js application files are modified.
- The project’s historical deployment log and current public behavior do not identify the Hostinger site identity, deployed commit, or rollback map. MUK-5 remains the authoritative host-side verification task.
- No private inventory, credentials, customer records, or production database were inspected for this scan.

## Audit method and end-to-end coverage

The scan went from business outcome down to individual interface and data behavior, then traced bottom-up from source records and runtime behavior back to owner decisions and launch operations.

| Layer | Main gaps tracked |
|---|---|
| Business, audience, market, platform | Owner-approved product/customer journey and platform (MUK-25); market-specific terms (MUK-28) |
| Product data, provenance, claims | Inventory contract and reconciliation (MUK-26); real data and validation (MUK-8, MUK-9); evidence and claim governance across Technology, FAQ, Contact and Custom Jewelry content (MUK-10, MUK-11, MUK-27, MUK-33, MUK-34) |
| Content, information architecture, SEO | Approved navigation and page purposes for new WP templates (MUK-29); legacy intent and redirects (MUK-17); canonical/technical SEO (MUK-16, MUK-18, MUK-38); demand research (MUK-24) |
| Journeys and customer operations | Trade, D2C and custom jewelry paths if selected (MUK-30, MUK-31); safe WordPress Contact intake (MUK-41); inquiry channel validation (MUK-35); privacy, protection, delivery, ownership, retention, rollback and runbook (MUK-12–15, MUK-20–21) |
| UI, filters, accessibility | WordPress filters (MUK-32), Technology/Contact/FAQ page interactions (MUK-40–42), Next.js range validation (MUK-36), modal focus (MUK-37), responsive regression (MUK-39) |
| Release, lifecycle, measurement | Inventory freshness (MUK-22); search and funnel measurement (MUK-19); launch gate (MUK-20); operations diagnostics when retained (MUK-43); monitoring (MUK-23); Next.js end-to-end release checks (MUK-39) |

Bottom-up checks join inventory source → approved field/claim → rendered listing/detail and structured data → canonical route/sitemap → inquiry or selected checkout → safe record and operator assignment → follow-up/disposition → rollback and monitoring. MUK-20, MUK-21 and MUK-39 retain the cross-layer release and operational checks.

## Competitor benchmark — observed 2026-10-29

These public examples suggest patterns worth evaluating after the owner selects the customer and market. Do not copy claims or policies.

| Competitor | Public pattern observed | Backlog implication |
|---|---|---|
| [KIRA](https://kiradiam.com/) | Presents an integrated grow/cut/polish/grade/manufacture story and a trade inventory portal. | Decide whether a B2B trade journey is in scope before implementing gated access, trade pricing or inventory tools (MUK-25, MUK-30). |
| [Limelight Diamonds](https://limelightdiamonds.com/pages/store-locator/limelight-lab-grown-diamonds-1) | Makes stores, appointments and support discoverable; its [exchange/buyback policy](https://limelightdiamonds.com/pages/exchange-buyback) describes India scope, conditions and required records. | Approve the actual operating entity, market, fulfillment ability, and policy terms before publishing comparable promises (MUK-28). |
| [Brilliant Earth](https://www.brilliantearth.com/lab-grown-diamonds/) | Provides product grading-report access and describes close-up/360 viewing, showroom and virtual-assistance options; its catalog exposes detailed filter facets. | Map evidence and media to the exact item, make only supported filters usable, and offer assistance only if the owner can provide it (MUK-10, MUK-26, MUK-32, MUK-34). |
| [Ritani](https://www.ritani.com/pages/frequently-asked-questions) | Describes grading certificates, comparison filters, virtual gemologist appointments and custom-ring quotes; its current FAQ says lab-grown stones are not eligible for its upgrade program. | Verify certificate/report identity and assistance/policy promises by market and flow; competitor terms are not transferable (MUK-26, MUK-28, MUK-32, MUK-34). |
| [Clean Origin](https://www.cleanorigin.com/diamonds/) | Organizes catalog entry by diamond shape and price and links certification and education from navigation. | Map verified query intent to helpful category and education paths, only where owner-approved product support exists (MUK-24, MUK-29). |
| [Ada Diamonds](https://www.adadiamonds.com/developers) | Documents public inventory/content REST APIs, MCP and machine-readable catalog descriptions. | Research machine-readable distribution as an optional opportunity; require authorized inventory, privacy/rights, freshness and owner selection before exposing a feed (MUK-6, MUK-8, MUK-18, MUK-24). |
| [VRAI](https://www.vrai.com/en-AU/lab-grown-diamonds) | Connects shape discovery, origin story, expert assistance, virtual appointments and education in its market-specific journey. | Evaluate clear audience paths and substantiated brand-specific proof; do not repeat competitor origin or environmental claims as evidence (MUK-11, MUK-24, MUK-27, MUK-29). |

The current CVD experience visibly discloses sample inventory, does not establish a Hostinger deployment identity, and routes legacy shop/ring paths to the loose-stone catalog. Project materials and the live scan also leave real product evidence, policies and test-only bot protection unresolved. Those are evidence gaps for this product, not claims about what a competitor does or does not support. Competitor pages cannot establish demand, legal compliance, data rights, or operational capability for this business.

## Current CVD gaps against observed competitor patterns

This comparison records what was and was not visible in the current public CVD flow. It does not infer hidden features or make a feature-parity requirement.

| Pattern seen in benchmark | Current CVD evidence from the sampled public flow | Action kept in backlog |
|---|---|---|
| Per-item grading report and close-up media | The sampled CVD stone detail presents illustrative/sample data, a cut diagram and certificate information on request; approved real-stone media/report mapping was not established. | Confirm owner-approved data, rights and exact-item report mapping before publication (MUK-8, MUK-10, MUK-26, MUK-34). |
| Market-specific customer policies and assisted shopping | No policy links were visible in the sampled form/footer entry points, and no store/appointment flow was observed on the sampled CVD pages. This is limited to those surfaces. | Owner decides the supported markets, policies, assistance channels and operational promises before copy or flow changes (MUK-25, MUK-28, MUK-29). |
| Trade inventory portal and trade eligibility | No trade enrollment or gated pricing appeared in the current public Next.js journey. The separate WordPress source contains B2B code, but its live use is unverified. | Decide whether the offer is trade, consumer, or mixed; implement only the selected journey and enforce access/price rules (MUK-25, MUK-30). |
| Deep product filters with reliable counts | The current CVD catalog exposes filters, but its data is illustrative; the scan found a horizontally scrolling desktop table and did not establish robust malformed-range behavior. | Keep the supported filter contract, accessible error handling and count/result parity explicit (MUK-26, MUK-32, MUK-36, MUK-39). |
| Clear public proof and operational follow-up | The public inquiry page showed a test-only Turnstile label. Live inbox delivery, lead assignment and follow-up completion remain unverified. | Verify bot protection and mail/data services, name a primary/backup inquiry owner and close the inquiry loop before launch (MUK-13–15, MUK-20–21, MUK-35, MUK-39). |

## Waves and priority order

| Wave | Issues | Count | Purpose |
|---|---|---:|---|
| Wave 0 — Reconcile & Decide | MUK-5, MUK-6, MUK-7, MUK-25 | 4 | Resolve direction, source and deployment truth. |
| Wave 1 — Trustworthy Catalog & Content | MUK-8, MUK-9, MUK-10, MUK-11, MUK-22, MUK-26, MUK-27, MUK-28, MUK-29, MUK-33, MUK-34 | 11 | Approve trustworthy data, evidence, claims and content. |
| Wave 2 — Production Operations & SEO | MUK-12, MUK-13, MUK-14, MUK-15, MUK-16, MUK-17, MUK-18, MUK-19, MUK-30, MUK-31, MUK-32, MUK-35, MUK-36, MUK-37, MUK-38, MUK-40, MUK-41, MUK-42, MUK-43 | 19 | Deliver selected customer journeys, platform hardening and SEO. |
| Wave 3 — Launch Gate & Run Operations | MUK-20, MUK-21, MUK-23, MUK-24, MUK-39 | 5 | Prove release readiness and operate the product. |

Priority is ordered Urgent, High, Medium, then Low. Dependencies determine execution order across and within waves. MUK-22 is an early inventory prerequisite; start its lifecycle-policy work after MUK-6, MUK-8 and MUK-9 clear, regardless of the wave label. Owner decisions remain explicit; no due dates or assignees were invented.

## Linear dependency summary

The Linear blocker graph currently contains 143 directed blocker edges and has no detected cycle. The approved Next.js hardening sequence is MUK-35 through MUK-38 → MUK-39 → MUK-20. MUK-35–38 complete using their own targeted verification; they do not wait for MUK-39 or production launch. MUK-39 consolidates those tests, and MUK-20 owns production go/no-go evidence. MUK-40, MUK-41, and MUK-42 are separate WordPress-only page branches gated by MUK-25/MUK-29 and block MUK-20 only if their pages/flows are retained. MUK-43 is optional gated admin diagnostics and does not stand in for production verification.

## Detailed backlog
## Wave 0 — Reconcile & Decide

### [MUK-5: Verify the active CVD deployment, domain mapping, and preview](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 0 — Reconcile & Decide<br>
**Blocked by:** None<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-7](https://linear.app/mukund-ajmera/issue/MUK-7/secure-the-wordpress-rollback-path-and-retention-decision)

#### Job story

When the team is preparing a production change, they want a current verified map of the hosting target and domain, so they can act on the correct site.

#### Why

The local `docs/PHASE-2-EXECUTION-LOG.md` says the cutover to `labgrowndiamondcvd.com` completed on 2026-10-27. A read-only Hostinger lookup found no entry for the recorded `purple-echidna-870761.hostingersite.com` preview. A fresh public visit on 2026-10-29 confirmed that the root currently serves the Next.js site and that `/shop/` and `/engagement-rings/` both resolve to `/diamonds`. Public routing does not identify the Hostinger website, deployed commit, or rollback mapping. Verify those host-side facts independently; do not describe the public domain as wholly unresolved.

#### Acceptance criteria

* Record the current Hostinger website identity, attached domain(s), deploy/build identity, and whether the recorded preview still exists.
* Verify apex and `www` HTTPS behavior, canonical URL, robots/noindex state, sitemap, and current WordPress location.
* Record the rollback path and any relevant provider-side backup/subdomain side effects.
* Update the conflicting Phase 2 status docs with dated evidence after the check; do not change hosting or DNS as part of this issue.
* Record the observations with a timestamp and source so historical claims are not presented as current facts.
* Separate verified facts from unresolved items and list the owner/action needed for each unknown.

#### Dependencies / constraints

Requires authorized read-only Hostinger/domain inspection. No deployment, domain/DNS change, or WordPress edit is included.

#### Sources

`docs/PHASE-2-DOMAIN-TRANSFER.md`; `docs/PHASE-2-EXECUTION-LOG.md`; parent setup review update (2026-10-28).

#### Customer-visible routing addendum (2026-10-29)

A fresh public visit found that the live root is the Next.js site; `/shop/` and `/engagement-rings/` both resolve to `/diamonds`. This confirms current public routing behavior only. It does not identify the Hostinger project, deployed commit, rollback mapping, or intended disposition for either route. Record those separately and preserve the distinct intent of ring/jewelry routes when the owner approves the route map.

#### WordPress source checkout handoff (2026-10-29)

If WordPress is selected, record the owner-approved repository remote, branch, clean source commit and canonical checkout Jules must use, then map the deployed build to that revision. MUK-6 covers the separate Next.js app and does not approve the WordPress checkout. Do not use a stale local WordPress checkout merely because its folder or branch name looks canonical; compare its commit with the approved remote before implementation.

### [MUK-6: Establish the authoritative CVD app repository and source history](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 0 — Reconcile & Decide<br>
**Blocked by:** None<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal), [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges), [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When someone resumes CVD app work, they want an owner-approved repository and reproducible source revision, so changes remain traceable and separate from WordPress.

#### Why

The populated Next.js app is at `D:\Projects\labgrowndiamondcvd`, while the README and DECISIONS.md name conflicting paths and describe the app folder as empty. The app folder has no Git metadata. The README names `mukundajmera/labgrowndiamondcvd`, but a read-only inspection of that remote's `main` showed a WordPress tree.

#### Acceptance criteria

* Confirm the canonical Next.js app path and identify an owner-approved remote and branch dedicated to this app.
* Establish a reproducible source revision and clean worktree for app changes.
* Do not use or push to the README-named remote unless its owner explicitly confirms it is the intended app repository; its current `main` is a WordPress tree.
* If no app repository exists, prepare a dedicated-repository restoration proposal and obtain owner approval before creating or pushing to a remote.
* Reconcile README.md and DECISIONS.md so the app path, source-control location, and WordPress boundary are unambiguous.
* Block app deployment or commit work from an unversioned snapshot until source identity is resolved.

#### Constraints

Preserve existing app files. Do not mix the app with the separate WordPress checkout.

#### Sources

`README.md`; `DECISIONS.md` D-01; local Git discovery and read-only remote-tree check (2026-10-28).

### [MUK-7: Secure the WordPress rollback path and retention decision](https://linear.app/mukund-ajmera/issue/MUK-7/secure-the-wordpress-rollback-path-and-retention-decision)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 0 — Reconcile & Decide<br>
**Blocked by:** [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When the team needs to roll back a domain or hosting change, they want a verified WordPress backup and restore path, so the original site remains recoverable.

#### Why

The Phase 2 execution log says WordPress was moved to a temporary Hostinger hostname and that changing its domain removed automatic backups and subdomains. It also notes the WordPress database still contains the production URL, affecting rollback.

#### Acceptance criteria

* Record the current WordPress site identity and temporary hostname from an authorized read-only check.
* Confirm a complete files-and-database backup exists outside the host and has a documented restore path; create/verify it only with owner authorization.
* Document how to restore WordPress after a domain remap, including its stored site URL and cache steps.
* Set a retention/retirement decision and record that WordPress is not deleted or retired without explicit owner approval.


* Verify the backup can be restored in a safe, non-production location or document the exact tested restore procedure and evidence.
* Record the WordPress temporary-host access owner and the final retirement date or explicit hold decision.

#### Dependencies / constraints

Coordinate with Wave 0 deployment/domain verification. Do not modify WordPress or change domain mapping as part of this issue.

#### Sources

`docs/PHASE-2-EXECUTION-LOG.md`; `docs/PHASE-2-DOMAIN-TRANSFER.md`.

### [MUK-25: Approve the primary customer journey and product direction](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 0 — Reconcile & Decide<br>
**Blocked by:** None<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal), [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges), [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix), [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-40](https://linear.app/mukund-ajmera/issue/MUK-40/integrate-the-approved-technology-guide-with-accessible-responsive), [MUK-41](https://linear.app/mukund-ajmera/issue/MUK-41/deliver-the-approved-wordpress-contact-flows-safely-end-to-end), [MUK-42](https://linear.app/mukund-ajmera/issue/MUK-42/integrate-the-approved-wordpress-faq-page-with-accessible-interactions), [MUK-43](https://linear.app/mukund-ajmera/issue/MUK-43/wire-and-harden-the-wordpress-plugin-health-dashboard)

#### Job story

When the team chooses what to improve next, it wants an approved, evidence-backed view of the primary customer and buying journey, so product, platform, content, and measurement work serves a defined business outcome.

#### Context

The current backlog describes a Next.js loose-stone inquiry catalog. The discovered Git checkout is a separate WordPress/WooCommerce site. The public domain currently renders the Next.js sample catalog. This does not establish the intended product model or future source of truth. The backlog must not assume B2B, B2C, or a dual model.

The checkout/domain/repository facts belong to [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview) and [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history). This issue resolves business direction using those findings without replacing their technical verification.

#### Scope

* Inventory available evidence and label facts, inferences, recommendations, and open questions.
* Prepare an owner decision brief that distinguishes a primary launch journey, secondary journeys, and deferred scope.
* Define measurable outcomes and their accountable owners.
* Present competitor capabilities as examples only.

#### Out of scope

* Building or migrating either platform.
* Resolving repository, hosting, domain, or deployment state assigned to [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)/[MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history).
* Treating competitor features as proof of demand or requiring feature parity.

#### Inputs and owner handoff

* Use the existing backlog, project materials, current public site, and the dated competitor evidence below.
* Jules prepares the evidence-based draft. Jules marks each item as fact, inference, recommendation, or open question.
* The CVD owner names the decision approver and metric owners before approval.
* The named owner approves the primary journey and records any decision that remains deferred.

#### Acceptance criteria

1. The versioned brief names target customer segments, target markets/geographies, products offered, and the primary launch journey.
2. The brief identifies at least one secondary journey and explicitly lists deferred or excluded journeys.
3. The brief compares candidate models, such as trade supply, direct-to-consumer jewelry, or a dual model, without presuming which one is selected.
4. Each decision records its status, rationale, source/evidence, evidence date, decision owner, and approval date. Evidence gathering and owner approval are separate steps.
5. Each selected success metric has a name, operational definition or formula, accountable owner, data source, baseline or “baseline not yet available” with reason, and target period. The owner approves targets; Jules does not invent them.
6. Platform and capability recommendations state assumptions that need verification under [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)/[MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history).
7. The owner approves an identified numbered and dated version of the brief. Open decisions identify the affected downstream issues and remain visibly unresolved.
8. Only implementation that depends on an unresolved decision is gated. Unrelated verification, evidence collection, and already authorized remediation may continue.

#### Deliverables

* Versioned product-direction decision brief.
* Decision log separating evidence, inference, open question, recommendation, and owner-approved decision.
* Metric register with definitions, owners, sources, baselines, and target periods.

#### Verification

* Check that the approved brief covers every acceptance criterion.
* Confirm every selected metric has an owner and operational definition.
* Check downstream issue descriptions for assumptions that contradict the approved primary journey.

#### Dependencies and handoff

* [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview) and [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) provide deployment and source-control facts.
* MUK-26 consumes the primary product direction when drafting the catalog data contract.
* MUK-27 and MUK-28 consume the selected markets and journeys for claim and policy disposition.
* MUK-29 consumes the approved audiences and journey for navigation planning.

#### Sources and evidence limits

* Current public pages inspected 2026-10-29: [https://labgrowndiamondcvd.com/](<https://labgrowndiamondcvd.com/>) and [https://labgrowndiamondcvd.com/diamonds](<https://labgrowndiamondcvd.com/diamonds>).
* Repository discovery 2026-10-29: populated Next.js app at `D:\Projects\labgrowndiamondcvd`; separate Git WordPress checkout, current default branch `master`, commit `7596d48c`. The earlier source baseline for MUK-30–34 was `b993fc92`; those referenced files are unchanged by `7596d48c`.
* Competitor examples reviewed 2026-10-29: [KIRA](<https://kiradiam.com/index.html>), [Limelight Diamonds](<https://limelightdiamonds.com/>), [Brilliant Earth](<https://www.brilliantearth.com/lab-grown-diamonds/?abv=v3>), [Ritani](<https://www.ritani.com/pages/frequently-asked-questions>), [Clean Origin](<https://www.cleanorigin.com/diamonds/>), [Ada Diamonds developer API](<https://www.adadiamonds.com/developers>), and [VRAI](<https://www.vrai.com/en-AU/lab-grown-diamonds>). Public pages are examples, not evidence of this business’s demand, rights or economics. Recheck these dated observations before use.

#### Shared WordPress fixture-harness ownership (2026-10-29)

If WordPress is selected and any WordPress implementation is retained, MUK-25 records one shared fixture-harness bootstrap owner before implementation. The first retained WordPress issue named there owns the one-time pinned harness, setup/teardown documentation, synthetic fixtures and local-only service sinks; all other WordPress tasks consume the same harness. Pin versions from the approved source/deployment profile, route email to Mailpit, and block outbound production integrations. If no WordPress implementation remains, record that the harness is not needed. This prevents each Jules task from inventing a different environment or leaving setup to an unnamed companion task.

## Wave 1 — Trustworthy Catalog & Content

### [MUK-8: Replace fictional sample stones with owner-approved inventory](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)

#### Job story

When a buyer browses the catalog, they want accurate approved stone details, so they can make an inquiry based on real inventory.

#### Why

The current 84-stone CSV contains fictional stock IDs, prices, and availability, and the sample-data banner is intentionally visible. The public catalog must not imply these are real offers.

#### Acceptance criteria

* Owner supplies and approves the real inventory source, currency, price basis, certificate fields, and availability conventions.
* Replace sample rows while preserving the documented CSV schema; validate every published stone against its source and certificate.
* Remove fictional records and turn off the sample banner only after reconciliation is complete.
* Rebuild/deploy and verify catalog count, representative detail pages, prices, stock IDs, and sitemap entries.
* Keep a traceable source reference for each published row and verify its stock ID, price, currency, status, and certificate fields.
* Confirm the final build contains no sample rows and the visible sample-data disclosure is disabled only after owner approval.

#### Complete sample-disclosure surface audit (2026-10-29)

Before clearing sample status, trace every public entry surface and generated representation: home page and featured cards, catalog/listing, stone detail, metadata/title/description/Open Graph, JSON-LD, sitemap, and social/search previews. Confirm the sample flag and labels behave consistently in the selected release artifact. If any record remains synthetic, retain clear disclosure wherever it appears or remove the record and every sample-derived price, count, certificate, availability, and offer claim. A clean catalog alone does not prove homepage metadata or structured data is safe.

#### Dependencies

Owner-approved inventory; confirmed deployment target and approved Next.js source-control location. Inventory can be prepared earlier, but app integration and release must wait for Wave 0.

#### Sources

`README.md`; `DECISIONS.md` D-03/D-04; `docs/PHASE-2-EXECUTION-LOG.md` open items.

#### Customer-visible urgency addendum (2026-10-29)

The public homepage says “84+ stones in the sample inventory”; catalog and individual stone pages also display explicit sample-data warnings. These records remain fictional and must never be represented as offers. Keep or strengthen the fail-closed notice until the named owner approves the exact inventory snapshot. The public read is evidence of current display only, not proof that any stock is real.

### [MUK-9: Add a repeatable inventory validation and release check](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When an operator prepares an inventory release, they want automatic validation and a preview, so bad or stale product data does not go live.

#### Why

Inventory is read at build time; CSV replacement requires rebuild/redeploy. A malformed, stale, duplicate, or mismatched row can publish incorrect product facts.

#### Acceptance criteria

* Validate required columns, unique stock IDs, allowed shape/color/clarity/status values, numeric ranges, currency, and certificate references before build.
* Fail the release on invalid rows and show actionable row-level diagnostics without exposing private source files.
* Document a preview check for inventory count, representative records, sample-data flag, generated pages, and sitemap consistency.
* Demonstrate the check with valid and invalid fixture data.


* Report row number and field name for every rejected value so an operator can correct the source quickly.
* Verify inventory count, representative details, generated pages, and sitemap all match the approved source after a build.

#### Dependencies

Use the approved inventory contract from [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory).

#### Sources

`DECISIONS.md` D-03/D-04; `README.md` inventory instructions.

#### Conditional WooCommerce inventory ingestion and reconciliation (2026-10-29)

If MUK-25 selects WordPress/WooCommerce, MUK-9 owns the selected source-inventory import/reconciliation and release-preview path: map owner-approved rows to WooCommerce product/SKU/variation attributes, price/currency, evidence identity and raw stock/status fields under the approved MUK-26 contract. Validate, preview and apply idempotent source-row updates; report accepted/rejected/conflicting rows; preserve provenance; detect stale, missing, deleted and duplicate rows; and provide rollback/recovery evidence. Enforce conservative publication for unknown or unapproved values, but do not implement sold/held/available transitions or URL disposition here: MUK-22 owns those lifecycle decisions and behavior, and consumes this validated import path. Never invent product facts or test with a live production import. If Next.js is selected, keep its CSV/build path and do not create WooCommerce infrastructure.

### [MUK-10: Approve design source, product imagery, and certificate evidence](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory)<br>
**Blocks:** [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site)

#### Job story

When a buyer evaluates a stone, they want authorized images and certificate evidence, so the product page is credible and truthful.

#### Why

`design.md` is absent; existing design tokens were taken from the WordPress theme. The catalog uses SVG cut illustrations and three labelled on-request photo slots because approved stone photography is not available.

#### Acceptance criteria

* Owner supplies or explicitly approves the design source/tokens used by the app.
* Provide authorized product imagery and certificate evidence, or explicitly approve keeping clearly labelled placeholders.
* Confirm each image corresponds to the listed stone and has useful descriptive alt text; record asset rights/source.
* Remove or intentionally retain all on-request placeholders with accurate copy.


* Record the source and usage rights for each delivered image and certificate asset.
* Verify the final pages do not imply a certificate, image, or design attribute that the owner has not approved.

#### Dependencies

Owner design and asset decisions; approved inventory from [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory).

#### Sources

`DECISIONS.md` D-02/D-10; `docs/SEO-CHECKLIST.md` real photography TODO.

#### WordPress bespoke media and testimonial addendum (2026-10-29)

If the Custom Jewelry page is retained, inspect `page-custom-jewelry.php:169–231` at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. CAD/finished-jewelry visuals are placeholders while named customer stories, specifications and quotes are presented as real. Do not publish customer/product imagery or testimonials without source, rights and owner approval. Record placeholders and require claim/asset owners to disposition them before launch.

### [MUK-11: Have a gemologist review product claims and learning guides](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory)<br>
**Blocks:** [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When a visitor reads diamond education, they want claims reviewed by a gemologist, so they can rely on accurate guidance.

#### Why

The existing guides and product education were written from general knowledge; the SEO checklist explicitly calls for gemologist review before launch.

#### Acceptance criteria

* A qualified reviewer checks CVD/HPHT, lab-grown/natural comparisons, 4Cs, certificate/lab claims, and any price or availability language.
* Record approvals and requested edits with sources for claims that need substantiation.
* Correct inaccurate or overstated language and confirm sample/fictional data is not presented as real.


* Review the CVD/HPHT process descriptions and any environmental or origin statements.
* Review the lab-grown/natural comparison, 4Cs explanations, certificate-lab references, and all price/availability claims.
* Record reviewer identity, sources, requested edits, and approval status for each guide.
* No unreviewed or unsupported factual claim remains in published educational content.

#### Technology-page review scope addendum (2026-10-29)

If WordPress is retained, review the source-only candidate template `wp-content/themes/astra-child/page-technology.php` at origin/master commit `7596d48c6b13b533a0fd5ce7c34c47877476862b` and reconcile it with `page-education.php`. Cover identity/equivalence and “purer/better” copy, CVD/HPHT process and temperature descriptions, Type IIa prevalence and purity comparisons, 99.8% AI grading accuracy, and generalized method superiority. Resolve the conflicting CVD temperature statements between these guides; tie every numerical/comparative statement to suitable primary sources and scoped wording or correct/remove it. The template does not prove an assigned, reachable, or published page; MUK-25 selects the platform and MUK-29 verifies page/route/purpose before rendered approval.

#### Dependencies

Named gemologist/SME reviewer and approved product facts.

#### Sources

`docs/SEO-CHECKLIST.md` content TODO; `DECISIONS.md` D-04; `docs/REFERENCE-SITES.md`.

#### Homepage claims and published guide provenance (2026-10-29)

Review claims across homepage copy, metadata, featured cards and structured data as well as catalog/detail and learning pages. The source homepage says gemologists confirm every detail and references IGI/GIA certificates while current data is sample inventory. Require owner evidence for named staff/qualification, review coverage, response/service promises, certificate relationships and real availability before these appear as fact. Suppress or qualify them while sample status is active.

For each published guide, keep the approved content revision, qualified reviewer identity/credentials, review date and source list with the authoring record. If the owner approves public attribution, visibly render reviewer/date and useful source links; never invent an author or date. Verify Article JSON-LD author/date fields match the approved visible, source-backed record. Record the owner’s public-attribution decision when attribution is withheld.

### [MUK-22: Define sold-stone, removal, and inventory freshness behavior](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote)

#### Job story

When a stone sells or leaves inventory, the business wants a defined lifecycle, so pages do not imply false availability or disappear unpredictably.

#### Why

A stone removed from `data/diamonds.csv` currently disappears and returns a 404 after rebuild. Availability and price freshness ownership are not specified.

#### Acceptance criteria

* Agree an owner and update cadence for inventory freshness and sold/held/available status.
* Decide whether removed stone URLs return 410, redirect to a relevant shape page, or retain a sold detail page; avoid misleading availability.
* Implement the chosen behavior consistently in catalog, detail pages, Product structured data, and sitemap.
* Verify the behavior with available, sold, and removed-stone cases and document the release procedure.
* Define the source-of-truth transition for available, held, sold, and removed stones.
* Ensure the selected behavior does not leave stale prices, false availability, or broken internal links.

#### Dependencies

[MUK-8](<https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory>) approved inventory schema and owner decisions.

#### Sources

`DECISIONS.md` D-03/D-04; `docs/SEO-CHECKLIST.md` Crawling and indexing TODO.

#### Structured-data addendum (2026-10-29)

Coordinate the stock lifecycle and the [MUK-18](<https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site>) Product Offer schema mapping. The Next.js code currently maps Memo to PreOrder without an established preorder commitment or expected date. Define each public status and its truthful customer-facing/structured-data behavior together; Sold/removed items, holds, memo inventory, and unknown status must not imply a purchasable offer.

### [MUK-26: Approve the inventory data contract and reconciliation specification](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges), [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)

#### Job story

When the team prepares inventory for publication, it wants an owner-approved specification for fields, sources, and exceptions, so the implementation does not silently publish incorrect or unsupported stone data.

#### Context

[MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) replaces fictional inventory; [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) implements validation and release checks; [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) handles design assets and certificate evidence; [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) implements lifecycle behavior. This issue defines the contract and reconciliation method only. It must not duplicate those implementation issues.

#### Scope

* Specify the source of truth and reconciliation rules.
* Define a versioned, platform-neutral field dictionary and approved snapshot format.
* Prepare synthetic or redacted fixtures that demonstrate edge cases.

#### Out of scope

* Replacing the catalog, implementing import or validation code, publishing inventory, or implementing lifecycle behavior.
* Acquiring image rights or certificates; those decisions and implementation belong with [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory)/[MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence).
* Storing customer inquiry data in inventory fixtures.

#### Inputs and owner handoff

* Jules inventories the documented inventory schema and required owner inputs.
* The owner names a catalog/inventory steward and supplies or identifies authorized sources.
* The steward resolves conflicts and accepts a versioned snapshot; Jules does not choose business facts such as currency, price basis, or availability rules.
* The specification may be prepared platform-neutrally. If [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects Next.js, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) must establish the authorized repository before [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) integrates the data.

#### Acceptance criteria

1. The versioned field dictionary defines each field’s meaning, type, allowed values, units, currency, public/private classification, source, and whether it is required or optional.
2. The source-precedence table states which authorized source wins for each field and how source record identity and provenance are retained.
3. Every transform, unit conversion, currency conversion, derived value, and default has an explicit rule and example. No default creates an unsupported product claim.
4. Rules cover conflicts, unknown or missing values, duplicate stock IDs, possible certificate/report duplicates, invalid or unavailable certificates, and assets whose usage rights are missing or unclear.
5. The specification defines freshness fields and timestamps, including timezone and meaning of “as of,” without deciding the operational stock lifecycle owned by [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior).
6. Public/private handling identifies fields that must never reach public pages, generated files, or public fixtures.
7. Reconciliation is balanced: every source row has exactly one disposition—approved for catalog, explicitly excluded with reason, or unresolved for owner review. Totals reconcile to each named, dated source snapshot. Duplicates are flagged rather than silently dropped.
8. Deliver synthetic or redacted fixtures with expected outcomes for valid records, missing/unknown values, conflicts, duplicate IDs, unknown units/currencies, certificate mismatch, missing rights, and private-field leakage.
9. The named catalog owner accepts a dated, versioned contract and snapshot. Unresolved source or policy decisions remain explicit and block only dependent catalog integration.

#### Deliverables

* Versioned data contract and field dictionary.
* Source-precedence and transformation rules.
* Balanced reconciliation report for each named source snapshot.
* Synthetic/redacted fixtures with expected outcomes.
* Owner acceptance record.

#### Verification

* Independently recalculate reconciliation totals from the source dispositions.
* Check every fixture against its documented expected outcome.
* Confirm each accepted snapshot’s version and stable identity are recorded.
* Confirm this issue contains no importer, validator, public deployment, or [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) lifecycle implementation.

#### Dependencies and handoff

* [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) defines the primary journey and whether the catalog is public, trade-only, or mixed.
* [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) consumes the approved source and snapshot.
* [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) implements validation using the accepted contract and fixtures.
* [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) consumes report/asset identity and rights rules.
* [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) implements stock status and removal behavior.
* Add [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) as a blocker for integration only if [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects Next.js as the implementation platform.

#### Sources and evidence limits

* Existing issues [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior).
* Existing catalog documentation, including the sample CSV and its schema.
* [KIRA](<https://kiradiam.com/index.html>) and [Ritani](<https://www.ritani.com/collections/lab-grown-diamonds>) provide examples of inventory presentation. Their field choices are reference material, not the owner-approved contract.

#### Product-model selection addendum (2026-10-29)

The contract must match the product model approved in [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). If the launch offer is loose stones only, state that boundary and exclude jewelry-only fields. If finished jewelry, custom designs, or a mixed offer are approved, define distinct product/SKU and variant records, component-stone relationships, option identifiers, approved pricing/currency rules, inventory state, and custom-order timing fields where applicable. Do not collapse a jewelry SKU into a loose-stone record. Include synthetic fixtures and reconciliation dispositions for each selected record type, with source identity and public/private handling. Keep every model not selected explicitly deferred rather than implying it is supported.

#### Custom-jewelry option model addendum (2026-10-29)

If the owner selects the custom-jewelry offer, inspect `page-custom-jewelry.php:33–164` at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. Map cut/carat/clarity/color ranges, metal and setting choices to the approved loose-stone/product, SKU/variant/component, pricing/currency, inventory and custom-order fields. Unsupported combinations remain deferred; never imply availability, price or orderability without source and fulfillment support.

### [MUK-27: Build and approve a cross-platform public claims register](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy)

#### Job story

When a buyer encounters a product, process, service, or environmental claim, the business wants to know where it appears and what evidence supports it, so public statements are accurate for the intended audience and market.

#### Context

[MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) covers gemologist review of product claims and learning guides. This issue is a cross-platform claims inventory and approval record; it does not replace gemological review or rewrite all content. The scan must check current rendered surfaces rather than assume a claim or media type exists.

#### Scope

* Record exact public claims and visual proof across the active CVD site surfaces, including retained WordPress and Next.js pages when accessible.
* Include product facts, certificates/origin/treatment, inventory and pricing, service policies, environmental/ethical claims, testimonials/awards, and demo/sample/AI-generated or edited media where found.
* Route each claim to an appropriate evidence owner and reviewer.

#### Out of scope

* Repeating [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides)'s gemological analysis.
* Rewriting pages, conducting keyword research, changing site code, or deciding legal compliance without an assigned market reviewer.
* Inspecting private analytics, credentials, customer records, or unpublished personal media.

#### Inputs and owner handoff

* Jules inventories exact text or media, source location, and rendered context.
* The CVD owner identifies the claims register owner and names a legal/compliance reviewer for each approved market. The owner assigns evidence owners for inventory, certificates, environmental statements, and service claims.
* [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) supplies the approved audience and target markets for final disposition. Until then, Jules can gather evidence and record claims, but must mark market approval pending.
* Gemological claims link to [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides)'s reviewer and evidence rather than duplicating its technical review.

#### Acceptance criteria

1. Each register row includes exact claim text or a precise description of the visual, page/component or media location, source file or URL, rendered capture/date, audience, market/locale, and customer journey.
2. Each row identifies claim category, evidence source and date, evidence owner, required reviewer(s), scope/limitations, qualification needed, review deadline, and disposition: approved, qualify, replace, remove, or pending.
3. The register covers claims about diamond identity/origin, CVD/HPHT and post-growth treatment, grading/certification, stock/price/value, returns/buyback, shipping, sustainability/ethics/energy/carbon, testimonials, awards, and any material presented as customer or product proof.
4. Jules records fictional/sample/demo material and AI-generated or AI-edited media if found, including whether disclosure is visible and whether media could be mistaken for actual inventory, a real customer, or a verified process. Unknown provenance is marked unknown; Jules does not assert AI use without evidence.
5. The owner assigns a legal/compliance reviewer for each market before final market-specific approval. If no reviewer is assigned, affected claims remain pending and the register is not marked fully approved.
6. Competitor marketing never serves as evidence for this business's claims.
7. Every high-risk or unsupported claim has an owner-approved disposition and is removed, qualified, or supported before publication.
8. At baseline, capture rendered context for each accessible claim and record implementation ownership/disposition. Completion of this register does not wait for downstream implementation: MUK-33/MUK-34 verify their applied copy/data changes against approved register rows, and MUK-20 checks final deployed claims and disclosures before launch.
9. The final versioned register records reviewer identities, decisions, dates, and unresolved claims. [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) remains the source of gemologist signoff.

#### Deliverables

* Versioned cross-platform claims register.
* Evidence links and owner/reviewer assignments.
* Rendered captures for claims requiring context review.
* Baseline rendered audit report, implementation-owner handoff, and unresolved-claims list; MUK-20 owns final deployed reconciliation.

#### Verification

* Reconcile the source content inventory to register rows and document inaccessible surfaces.
* Sample-check each approved claim against its cited primary evidence.
* Capture baseline rendered context where accessible, including disclosures near product names/media; assign post-change verification to the responsible implementation issue and final deployment check to MUK-20.
* Confirm market-specific legal review exists or claims remain pending/unpublished.

#### Dependencies and handoff

* [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) for final audience/market dispositions.
* [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) for gemologist review.
* [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) for asset source/rights.
* MUK-28 for service-policy evidence and owners.
* This issue provides an evidence register; other owners make and implement approved copy decisions.

#### Sources and evidence limits

* Existing issues [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls) and the documented sample-data disclosure.
* Competitor sites observed 2026-10-29: [Limelight](<https://limelightdiamonds.com/>), [Brilliant Earth](<https://www.brilliantearth.com/lab-grown-diamonds/>), [Ritani](<https://www.ritani.com/collections/lab-grown-diamonds>), and [KIRA](<https://kiradiam.com/index.html>). Their claims are not evidence for this business.
* For U.S. markets, [FTC environmental-claims guidance](<https://www.ftc.gov/business-guidance/resources/environmental-claims-summary-green-guides>) is a reference for the assigned legal reviewer, not a substitute for market-specific review.

#### Technology-template evidence scope addendum (2026-10-29)

If WordPress remains in scope, inventory `wp-content/themes/astra-child/page-technology.php` at origin/master commit `7596d48c6b13b533a0fd5ce7c34c47877476862b` as source-only until [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) verifies the assigned page and rendered URL. Include its broad equivalence/quality claims; CVD/HPHT process, purity, grades, growth time, costs and accuracy; named IGI/GIA/GCAL and free/included/shipped-separately certificate promises; and quantified water, carbon, land, waste, renewable-power, carbon-neutrality, water-recycling, India-origin and zero-conflict claims. Record exact source, rendered context/date when reachable, evidence, owner, reviewer, market, scope and disposition. Route gemological statements to [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), and business-specific environmental/origin/service claims to evidence owners and the assigned market reviewer. Competitor statements are not substantiation.

#### New WordPress page claim inventory addendum (2026-10-29)

For origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`, add exact claims from `page-faq.php`, `page-contact.php`, and `page-custom-jewelry.php` after route/rendered-page verification. Include certificate/laser-inscription guarantees, 30-day returns, lifetime upgrade credit, CVD superiority, delivery/insurance; Contact claims about certified gemologists, locations/contact details, 4K inspection, 24-hour response and worldwide insured shipping; and Custom Jewelry claims about ethical sourcing, bespoke service, named testimonials/specifications and customer/CAD proof. Record source/capture, evidence owner, approval and market. A template or placeholder does not prove a real service, customer, location, product or promise.

### [MUK-28: Confirm customer policies and operational promises by market and flow](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-41](https://linear.app/mukund-ajmera/issue/MUK-41/deliver-the-approved-wordpress-contact-flows-safely-end-to-end)

#### Job story

When a buyer considers a stone, jewelry item, or inquiry, the business wants each published promise to match an approved and workable policy, so buyers know what applies and operators can fulfill it.

#### Context

[MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection) publishes the inquiry privacy notice; [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end) configures inquiry email delivery; [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls) owns lead-data access, retention, durability, and recovery. This issue records owner decisions and operational confirmation across selected customer journeys. It does not duplicate those implementations. Policy coverage is not yet verified until the audit is performed.

#### Scope

* Build a per-market, per-product-flow policy applicability and evidence matrix.
* Confirm policy owner, responsible legal reviewer, operating owner, and ability to fulfill each promise.
* Audit currently accessible product/form surfaces as a dated baseline and hand off the approved policy/version mapping and required disclosure placement. Selected implementation issues verify future rendered parity; MUK-20 verifies the deployed launch state.

#### Out of scope

* Drafting or publishing the privacy notice ([MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)).
* Configuring mail or form delivery ([MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end)).
* Implementing lead-data retention, access, backup, or recovery controls ([MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls)).
* Assuming a policy is absent solely because it was not in the current backlog.
* Giving legal advice or inventing returns, delivery, warranty, tax, or buyback terms.

#### Inputs and owner handoff

* Jules starts each matrix item as “not verified” until evidence is found.
* The owner names the policy decision approver, operating owner, and legal/compliance reviewer for each selected market.
* Operations confirms the actual ability to fulfill delivery, returns, payments, resizing, warranty, lead handling, and any other proposed promise.
* Final public copy remains pending until platform and target flows are selected and owners approve the terms.

#### Acceptance criteria

1. The matrix covers each approved market and applicable flow: public catalog, product detail, trade request or reservation, retail checkout/custom order if selected, inquiry/contact, delivery, return/refund/exchange/buyback, payment/tax/duties, certificate, sizing/resize, warranty/aftercare, and privacy/lead handling.
2. Every row records applicability as applicable, not verified, or not applicable with an owner-approved reason. “Not found” is recorded as “not verified,” not proof that no policy exists.
3. Every applicable promise identifies the contracting entity, policy location, market/currency, customer/product eligibility, exclusions, timing/fees, evidence source, decision owner, operational owner, legal reviewer, approval date, and fulfillment evidence.
4. Policies that are not operationally fulfillable remain unapproved and are not presented as live promises.
5. Privacy and inquiry rows provide explicit handoffs to [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), and [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls); they do not redefine those issues' implementation work.
6. After MUK-5 and platform selection, inspect currently accessible product and form entry points; record each observed route, policy link, contextual notice, dead end, and contradiction with capture date and evidence limits. This is a baseline audit and owner-decision input, not a wait for future implementation. For new or changed routes, hand off the approved policy/version mapping and required disclosure placement to the selected implementation issues. MUK-30/31/40/41/42 verify rendered parity for their selected flows; MUK-20 verifies deployed parity before launch.
7. A documented “not applicable” includes the reason and owner approval. A pending market, platform, or operating decision is not silently treated as approved.
8. The owner approves a dated matrix, and the legal reviewer records market-specific signoff or remaining conditions.
9. The matrix includes an exact approved policy/version and required disclosure placement for every selected flow, plus the implementing issue and verification owner. Completion of this issue does not wait for future route implementation: MUK-30/31/40/41/42 verify rendered mobile/desktop parity within each selected flow, and MUK-20 confirms deployed parity before launch. Do not enable inquiry or purchase flows with missing or contradictory required policy copy.

#### Deliverables

* Versioned market/flow policy applicability matrix.
* Decision, legal-review, and operations-fulfillment records.
* Baseline route/policy-link audit with evidence limits and implementation handoffs.
* Explicit handoff items for [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), and [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls).

#### Verification

* Trace currently accessible product/form entry points to the approved policy matrix and record gaps; assign future rendered verification to the selected implementation issue.
* Check matrix status, owners, approvals, and fulfillment evidence.
* Confirm every “not applicable” has a rationale and signoff.
* Confirm unresolved or non-fulfillable promises remain unpublished or visibly pending.
* Provide exact approved policy versions and disclosure placement to implementation owners; MUK-20 confirms final deployed parity.

#### Dependencies and handoff

* [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects primary customer journey and markets.
* [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview) and selected implementation source are required before rendered production checks.
* [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), and [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls) consume confirmed requirements for privacy notice, inquiry delivery, and lead-data controls.

#### Sources and evidence limits

* Existing project policy, form, inquiry, and data-control documentation.
* Existing issues [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), and [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls).
* Competitor policy examples observed 2026-10-29: [Limelight](<https://limelightdiamonds.com/>) and [Brilliant Earth](<https://www.brilliantearth.com/lab-grown-diamonds/>). These examples do not establish the owner's policies or operational capability.

#### New WordPress contact and policy addendum (2026-10-29)

If WordPress is selected, verify `page-contact.php` at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839` for owner-approved contact details, locations/hours, appointment availability, response target, virtual inspection, worldwide insured shipping, trade helpline, and holidays. Its embeds are explicitly mock maps in source. Also disposition FAQ promises for returns, upgrade credit, shipping/delivery and flow-specific terms. Verify an accountable operator/market before publication; otherwise remove or qualify them.

#### Selected-flow privacy and service promise alignment (2026-10-29)

For each selected market and flow, approve customer/business data purpose, notice/consent, processors/recipients, access, retention/deletion and support ownership alongside commercial policy. For MUK-30 include trade account and approved business/tax fields; for MUK-31 checkout include order/customer-data handling, payment tokenization boundary, fulfillment/refund/return owners, failed-webhook recovery and privacy-request handling. Tie response-time, appointment, shipping, exchange/upgrade and buyback promises to named operators and verifiable ability; remove/qualify unsupported promises.

### [MUK-29: Approve the audience-led navigation tree and page-purpose matrix](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-40](https://linear.app/mukund-ajmera/issue/MUK-40/integrate-the-approved-technology-guide-with-accessible-responsive), [MUK-41](https://linear.app/mukund-ajmera/issue/MUK-41/deliver-the-approved-wordpress-contact-flows-safely-end-to-end), [MUK-42](https://linear.app/mukund-ajmera/issue/MUK-42/integrate-the-approved-wordpress-faq-page-with-accessible-interactions)

#### Job story

When a visitor arrives with a particular buying or research need, the business wants a clear route to the right information and next step, so visitors do not encounter duplicate, disconnected, or ownerless pages.

#### Context

[MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site) owns technical SEO, [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls) owns legacy URL/redirect decisions, and [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave) owns future keyword-demand research. This issue defines page purposes, navigation, and relationships from the approved product direction. It does not decide keyword demand, migrate URLs, or implement technical SEO.

#### Scope

* Inventory current public page types on accessible WordPress and Next.js surfaces.
* Propose a platform-neutral navigation tree and page-purpose matrix for owner approval.
* Mark each page as retain, merge, revise, candidate, defer, or retire.
* Map page owners, journey relationships, and primary next actions.

#### Out of scope

* Keyword-volume research, search ranking estimates, or content prioritization by query data ([MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave)).
* URL migration, redirect rules, or legacy URL disposition ([MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls)).
* Canonical, sitemap, robots, structured-data, or other technical SEO implementation ([MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site)).
* Writing or implementing every proposed page or site navigation.
* Treating competitor pages or features as mandatory requirements.

#### Inputs and owner handoff

* Jules uses the approved [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) customer and product direction.
* Jules inventories accessible source pages/routes and records evidence and gaps.
* The owner names a content owner for each approved page or records that it must remain deferred.
* Page candidates are recommendations only. The owner decides what to keep, merge, create, defer, or retire.

#### Acceptance criteria

1. The page matrix records for each current page or proposed candidate: stable page identifier or current source location, audience/journey, visitor need, unique purpose, primary next action, parent/navigation position, related-page links, content owner, evidence/source, and disposition.
2. The proposed tree separates primary, secondary, and deferred customer journeys as approved in [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction).
3. Every retained page has one distinct primary purpose. Intent overlap is resolved by merge, differentiation, or an owner-approved reason to retain both.
4. Every retained launch page has an owner and at least one valid inbound relationship from an entry page, navigation item, or another retained page. No retained launch page is orphaned.
5. Candidate pages are explicitly marked and include rationale. No candidate is mandatory because a competitor has it or because it appears in an unvalidated keyword list.
6. Search-intent labels, if used, are qualitative and trace to the approved audience and product direction. Keyword volume and demand claims are reserved for [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave).
7. The matrix flags URL/redirect questions for [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls) and technical SEO questions for [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site) without prescribing or implementing their solutions.
8. The owner approves a dated navigation tree and page-purpose matrix. Unassigned pages or unresolved duplicate purposes remain flagged and are not treated as approved scope.
9. The handoff identifies which approved page requirements [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), and [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave) need, without duplicating their work.

#### Deliverables

* Current page/source inventory.
* Proposed navigation tree.
* Approved, versioned page-purpose matrix and disposition log.
* Handoff list for [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), and [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave).

#### Verification

* Traverse the proposed page graph from each primary entry route and confirm every retained page is reachable.
* Check that every retained page has a unique purpose, owner, journey, and next action.
* Check that deferred and candidate pages are labeled and no unsupported demand or platform assumption appears.
* Confirm redirects and technical SEO findings are handed off rather than implemented here.

#### Dependencies and handoff

* [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) provides approved audience, market, and primary journey.
* [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls) consumes legacy-page disposition for URL migration.
* [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site) consumes approved page types for technical SEO verification.
* [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave) consumes candidate page/content intents for demand research.

#### New WordPress page candidates addendum (2026-10-29)

Origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839` adds Contact (`page-contact.php`), FAQ (`page-faq.php`) and Custom Jewelry (`page-custom-jewelry.php`) templates. The homepage source links `/custom-jewelry-builder/`, and header/footer source links `/contact/`; neither proves a CMS page assignment, reachable route or publication. Inventory actual assignment/rendered URL and record audience, purpose, next action, parent/inbound links, owner, and retain/merge/defer disposition. Compare FAQ with Technology/Education and Contact FAQ. Send only approved routes to MUK-18. MUK-41/42 own selected contact/FAQ implementation.

#### Sources and evidence limits

* Existing backlog and accessible current WordPress/Next.js page sources.
* Competitor examples observed 2026-10-29: [Limelight](<https://limelightdiamonds.com/>), [Brilliant Earth](<https://www.brilliantearth.com/lab-grown-diamonds/>), and [Ritani](<https://www.ritani.com/collections/lab-grown-diamonds/>). Their page structures are examples, not proof of demand for this project.

#### Technology-page candidate addendum (2026-10-29)

Commit `7596d48c6b13b533a0fd5ce7c34c47877476862b` adds the WordPress template `wp-content/themes/astra-child/page-technology.php`. A template file does not prove a CMS page is assigned, reachable, in navigation, or published. No source-controlled inbound link was found in the reviewed checkout, and the existing `page-education.php` already covers CVD/HPHT; inspect the CMS page/template assignment and rendered URL, then compare purpose/audience and record retain/merge/defer disposition, owner, primary action, related links and an approved inbound path. Keep route/menu status unverified until checked in an authorized environment. Hand the approved route to [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site); [MUK-40](https://linear.app/mukund-ajmera/issue/MUK-40/integrate-the-approved-technology-guide-with-accessible-responsive) owns approved template integration.

### [MUK-33: Stop inferred product attributes from generating factual copy](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority:** High · **Wave:** 1 — Trustworthy Catalog & Content

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) platform decision; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) approved product field/provenance contract; [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) cross-platform claims register and reviewer assignments; [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) approved product data, [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) validation, and [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) gemologist review for gemological claims.

**Job story:** When a product record lacks a verified specification, the catalog should preserve that uncertainty so customers never receive guessed growth, color, clarity, lab, treatment, or composition claims.

**Platform gate:** Planning and read-only mapping may proceed before [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). No WordPress code/content changes, deployment, production-data access, or production-service calls until WordPress is selected/retained. If another platform is selected, retarget and update paths, evidence, setup, acceptance criteria, and tests to deliver the same behavior there. A migration note alone is not delivery.

**Source context at** `b993fc92`**:** `wp-content/themes/astra-child/includes/class-lgd-automator.php:251–276` generates copy when only one of carat, shape, or color exists, filling missing fields with `CVD`, `Excellent`, `VS+`, and `IGI`. Lines `278–291` infer Type Ia and “no visible color undertones”; lines `293–306` publish the values. Product-save and WooCommerce import hooks are at `:32–38, 171–239`.

**Scope:** Generate only from [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) source-backed fields and approved [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) claim wording. Unknown stays unknown. Preserve authored copy and flag unsupported factual claims for [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) disposition without auto-editing. Track generated-copy provenance and stale state when source fields change. Also audit pre-existing descriptions when source data is unchanged but generation provenance is unknown: mark them unverified and withhold unsupported generated claims until checked against [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) evidence and [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) disposition. Preserve authored copy and flag unsupported factual claims for [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) without assuming authorship from missing provenance. Gate changes to published records through explicit owner review. Do not approve facts or replace gemologist review.

**Owner handoff:** Approve required fields/sources, wording for gemological and forensic fields, minimum publication threshold, missing-field treatment, and a regeneration/review policy. Provide complete and partial synthetic records. Identify how generated and authored descriptions are distinguished.

**Acceptance criteria:**

 1. Never emit a factual default such as `CVD`, `Excellent`, `VS+`, `IGI`, Type Ia, or “no visible color undertones” unless its approved source supports it.
 2. Missing, malformed, conflicting, or unapproved values remain unknown and produce no inferred public claim.
 3. Incomplete products remain unpublished or in the owner-approved review state, with missing fields named.
 4. Import/manual-save paths behave consistently and do not overwrite authored copy.
 5. Existing descriptions with unknown generation provenance are audited even if their source fields are unchanged. Mark them unverified, check each factual claim against [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) evidence and [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) disposition, and withhold unsupported generated claims pending approval; do not classify copy as authored without evidence.
 6. A source-field change marks dependent generated text stale. Contradicted claims are withheld or held for owner review; stale copy is never presented as current fact.
 7. Published product updates require explicit authorized review; imports cannot auto-publish changed claims. Preserve prior versions for audit without exposing contradicted copy.
 8. Each generated claim maps to an [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) field and [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) wording/disposition.
 9. Tests cover complete/partial/missing/conflicting/invalid records, source changes, authored/generated text, published/unpublished states, review transitions, and repeated imports/saves. Include a synthetic legacy description with unchanged source fields and unknown generation provenance; assert it is marked unverified and unsupported generated claims remain withheld.
10. If platform selection changes, retarget and deliver the same behavior with updated references/setup/tests; a disposition note alone is not closure.

**Verification and tests:** Add `composer test:product-copy` to the shared harness. Assert exact output and post status for synthetic fixtures, stale-source invalidation, preservation of authored text, and idempotence. Include an unchanged-source synthetic legacy description with unknown generation provenance; verify it is marked unverified and unsupported generated claims are withheld. Run in the pinned isolated sandbox, plus `bash validate-repo.sh` and `php -l` on changed PHP files. Do not edit live product content.

**Deliverables:** Approved field/wording map; generator changes; import/save tests; and operator guidance for review and regeneration.

##### Shared WordPress test harness

Reuse one fixture-only sandbox at tests/wordpress/; do not create a separate test environment per issue. MUK-25 records one bootstrap owner; the selected issue there creates and documents the harness, while all other WordPress tasks consume it and report a blocker to that owner if absent. Pin WordPress/WooCommerce versions from the approved source and deployment profile, the approved PHP minor, database, PHPUnit, and Mailpit. Use synthetic users/products and a disposable database. Block outbound network except an explicitly approved payment sandbox for [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) when checkout is selected. Route all email to local Mailpit. Never use production data, credentials, SMTP, or real recipients.

Setup and teardown: docker compose -f tests/wordpress/compose.yaml up -d --wait; run composer install --no-interaction and this issue's documented suite; then docker compose -f tests/wordpress/compose.yaml down --volumes. Run `bash validate-repo.sh` and php -l on each changed PHP file. These syntax/repository checks do not replace the behavioral suite.

### [MUK-34: Show verified product evidence and truthful delivery information](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 1 — Trustworthy Catalog & Content<br>
**Blocked by:** [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority:** High · **Wave:** 1 — Trustworthy Catalog & Content

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) platform decision; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) evidence field/source contract; [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) approved certificate/media sources and rights; [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) gemologist review; [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) public claims register; [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) owner/legal-approved delivery policy and market coverage; [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock state/freshness. Estimates stay disabled until the approved operational source and terms exist.

**Job story:** When a shopper reviews a stone, they want to inspect its real evidence and know whether delivery timing is verified, so they can distinguish confirmed facts from unavailable information.

**Platform gate:** Read-only planning can proceed before [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). Do not change WordPress code/configuration, deploy, access production data, or call production fulfillment/lab services before WordPress is selected/retained. If another platform is selected, retarget and update paths, sources, setup, acceptance criteria, and tests to deliver the same outcome there. A migration note alone is not delivery.

**Source context at** `b993fc92`**:** `wp-content/themes/astra-child/woocommerce/content-single-product.php:57–66` contains a hidden 360 placeholder; `:308–323` renders a certificate button with `href="#"`. `wp-content/themes/astra-child/assets/js/pdp.js:58–79` generates a random 3–7 day estimate from a six-character pincode; `:89–106` shows a notification instead of certificate navigation. `wp-content/themes/astra-child/inc/woocommerce-customizations.php:121–164` separately renders GIA/IGI links when metadata exists and a 360 icon. `wp-content/themes/astra-child/functions.php:966–970, 1044–1057, 1108–1118` defines and renders certificate/video fields. Unify these evidence paths.

**Scope:** Map certificate lab/number/report URL and genuine media to the exact stock ID. Use only owner-approved reports and [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence)-approved assets. Remove random ETA behavior; show an estimate only from an approved service/operational source matching product, market, and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) status. Otherwise remove the checker or provide a clear unavailable/request state. Public claims must follow [MUK-27](https://linear.app/mukund-ajmera/issue/MUK-27/build-and-approve-a-cross-platform-public-claims-register) and delivery terms [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow).

**Owner handoff:** Approve authoritative certificate fields and report-link handling, exact media/rights/product mappings, delivery source/markets/statuses/fallback, and whether missing evidence blocks publication or gets an unavailable state.

**Acceptance criteria:**

1. Certificate controls resolve to that stone’s approved report or official verification page; never render a dead `#` link.
2. Existing certificate URL, GIA/IGI report-check, and PDP tab paths use one consistent product evidence record.
3. Show 360 controls only for genuine correctly mapped media; otherwise provide an accessible unavailable state without claiming inspection is available.
4. All evidence matches the page’s stock ID; mismatched/missing evidence is not displayed as proof.
5. ETA is never random. Any displayed date/range comes from the approved source and matches current product, [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock state, market, and [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) terms.
6. Invalid input, unsupported region, unavailable stone, timeout, empty/error response, or inconsistent data yields truthful accessible feedback without stale/fabricated dates.
7. Asynchronous response for an earlier pincode/product cannot overwrite a newer result; bind responses to request sequence and inputs and discard stale responses.
8. Keyboard, screen reader, and mobile users can identify report links, evidence status, and delivery result.
9. If platform selection changes, retarget and deliver the same outcome with updated references/setup/tests; a migration note alone is not closure.

**Verification and tests:** Add `composer test:pdp-evidence` to the shared harness. Use synthetic products, mocked report metadata, and mocked delivery responses. Test missing/mismatched reports, labs, media and 360 states, ETA errors, and out-of-order responses. Certificate URL construction tests must use fixtures/local mocks only: **never visit real or synthetic laboratory endpoints**. Block outbound network in the sandbox. Use no production data or APIs; run `bash validate-repo.sh` and `php -l` on changed PHP files.

**Deliverables:** Approved evidence mapping; unified certificate/media rendering; verified or removed ETA checker; fixture tests; and operator instructions for mapping evidence to the correct product.

##### Shared WordPress test harness

Reuse one fixture-only sandbox at tests/wordpress/; do not create a separate test environment per issue. MUK-25 records one bootstrap owner; the selected issue there creates and documents the harness, while all other WordPress tasks consume it and report a blocker to that owner if absent. Pin WordPress/WooCommerce versions from the approved source and deployment profile, the approved PHP minor, database, PHPUnit, and Mailpit. Use synthetic users/products and a disposable database. Block outbound network except an explicitly approved payment sandbox for [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) when checkout is selected. Route all email to local Mailpit. Never use production data, credentials, SMTP, or real recipients.

Setup and teardown: docker compose -f tests/wordpress/compose.yaml up -d --wait; run composer install --no-interaction and this issue's documented suite; then docker compose -f tests/wordpress/compose.yaml down --volumes. Run `bash validate-repo.sh` and php -l on each changed PHP file. These syntax/repository checks do not replace the behavioral suite.



## Wave 2 — Production Operations & SEO

### [MUK-12: Draft and publish a privacy notice for inquiry collection](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end)<br>
**Blocks:** [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When a visitor submits personal information, they want a clear privacy notice, so they understand how the inquiry will be handled.

#### Why

The inquiry form collects personal data. The form docs require a privacy notice before launch; the SEO checklist lists privacy/cookie notice as not done. The notice must match actual storage, email, bot-protection, and analytics configuration.

#### Acceptance criteria

* Confirm the fields, purposes, processors, storage location, access owner, retention, deletion route, and contact route used by the live form.
* Confirm the actual email provider, Turnstile configuration, and analytics/cookie behavior before finalizing the notice.
* Obtain owner/legal review of the notice and the retention language.
* Publish the reviewed notice at a stable URL and link it beside the inquiry form before real inquiries are accepted.
* Check that the notice does not claim controls or vendors that are not configured.
* Record whether a cookie notice or consent control is required by the final script inventory.

#### Dependencies

Finalize inquiry delivery, lead-data controls, and analytics decisions first. No customer inquiries are used as verification.

#### Sources

`docs/FORM-HANDLING.md` storage/protection section; `docs/SEO-CHECKLIST.md` Other TODO.

#### WordPress public-form privacy scope addendum (2026-10-29)

If WordPress is selected, include the four forms in `page-contact.php` and design-request form in `page-custom-jewelry.php` at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. Their markup lacks explicit POST/approved privacy path; browser default GET can expose names, email, message/design, phone and business/tax fields in URLs. Do not enable until fields/purpose, processors, storage/access, retention, notice/consent and approved route are verified. Test synthetic data in isolation.

#### Complete inquiry-data inventory for notice and consent (2026-10-29)

For the selected platform and every enabled inquiry/application flow, inventory all copies and fields, not just the primary lead record: inquiries.jsonl, delivery.jsonl, outbox.jsonl/dry-run payloads, stored IP or proxy-derived identifiers, mail-provider queues, access/audit logs, exports and backups. Record purpose, recipients/processors, access, retention/deletion/purge, backup/recovery and cross-border handling in the owner-reviewed notice/consent. Confirm dry-run/error paths do not create undisclosed copies. Apply the same inventory to approved B2B account fields through MUK-30.

### [MUK-13: Replace Cloudflare Turnstile test keys with production protection](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end)

#### Job story

When automated traffic targets the inquiry form, the business wants production bot verification, so genuine inquiries are protected from abuse.

#### Why

The live-form record says Cloudflare's always-pass test keys are in use. Honeypot, fill-time checks, and rate limiting are interim controls, not production bot verification.

#### Acceptance criteria

* Configure the production site key and secret through the hosting environment; no secret is committed or included in the client bundle.
* Verify valid challenges pass and invalid/missing tokens fail closed in production.
* Confirm honeypot, minimum-fill-time, and rate-limit controls still work and do not reveal whether a lead was stored.
* Record key ownership and rotation procedure without copying secrets into Linear or project docs.
* Confirm the site key is public-only and the secret remains server-side in the production environment.
* Document key ownership, rotation steps, and the operator who can update the values.

#### Dependencies

Wave 0 deployment identity; owner-authorized Cloudflare configuration and redeploy.

#### Sources

`docs/PHASE-2-EXECUTION-LOG.md` open items; `docs/FORM-HANDLING.md`; `DECISIONS.md` D-06.

#### Current public evidence addendum (2026-10-29)

The public stone inquiry form visibly rendered Cloudflare Turnstile text “For testing only. If seen, report to site owner.” Confirm whether this is the deployed production widget; if so, replace it with approved production keys and verify server-side rejection/acceptance safely before live intake. Do not treat the browser page alone as proof of the configured secret or server behavior.

#### WordPress public-form protection scope addendum (2026-10-29)

Include every approved Contact tab/form and custom-jewelry form at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. Server-side abuse controls must protect every selected endpoint; hidden tabs/client validation do not protect submissions. Use synthetic local tests for valid/invalid/missing challenge, honeypot and rate limit. The templates do not authorize live intake.

#### Platform-specific abuse-control verification (2026-10-29)

The current Turnstile issue/code path is Next.js-specific. Verify server-side secret use, expected hostname/action, bounded request timeout, fail-closed behavior, missing/invalid token, replay, and trusted-proxy client-IP parsing. Do not trust arbitrary first X-Forwarded-For values; document the approved proxy chain. Test throttling across the actual selected deployment topology rather than assuming an in-memory limiter is global across workers. If WordPress is selected, retarget this issue to its selected endpoint or have the WordPress issue implement and test an equivalent owner-approved server-side challenge/abuse control; the Next.js secret/config does not protect WordPress.

### [MUK-14: Configure inquiry email and verify internal delivery end to end](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)

#### Job story

When a buyer submits an inquiry, they want a confirmation and the business wants a reliable alert, so neither side is left uncertain.

#### Why

The execution log says inquiries are persisted but email remains dry-run until SMTP or Resend environment variables are set. Neither customer confirmation nor team notification should be assumed delivered.

#### Acceptance criteria

* Owner chooses SMTP or Resend and configures credentials only in the hosting environment.
* Configure verified sender/from and reply-to behavior; verify SPF, DKIM, and DMARC for the selected provider without altering MX or unrelated DNS records.
* Submit a controlled test to internal addresses only; confirm exactly one stored lead, customer confirmation, team alert, stock ID, and delivery-log success.
* Confirm failures are visible and documented; do not use a real customer recipient for testing.


* Verify the customer confirmation and internal alert contain the correct stock ID and reply-to address.
* Confirm the delivery log records success and failure without storing secrets or unnecessary personal data.

#### Dependencies

Wave 0 deployment identity; authorized provider credentials and DNS owner if records are required; test after real Turnstile setup.

#### Sources

`docs/PHASE-2-EXECUTION-LOG.md` open items; `docs/FORM-HANDLING.md`; `DECISIONS.md` D-06.

#### Truthful acknowledgment and delivery state (2026-10-29)

Do not show a customer a sent/delivered or one-business-day response promise when the message is only written to local dry-run storage, delivery is pending, or the provider reports failure. Acknowledge only the state confirmed by the selected handler; keep response-time wording behind MUK-28 approval and an operating owner/backup/SLA in MUK-21. Test accepted, queued, delivered, bounced, timeout and retry/duplicate states with synthetic messages and local Mailpit; no real recipients.

#### WordPress inquiry delivery scope addendum (2026-10-29)

If WordPress is selected, verify approved general, bespoke, wholesale, virtual-inspection and custom-jewelry submissions at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. The added forms have no explicit method/action or matching handler in the templates; do not treat a click/GET reload as successful delivery. After MUK-25/MUK-28 select flows and MUK-12/13/15 define privacy/protection/storage, trace synthetic POST through local storage and Mailpit, exactly-once internal alert, safe confirmation, visible failure/retry and operator assignment. No real recipient or production submission.

### [MUK-15: Set lead-data durability, access, retention, and recovery controls](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)

#### Job story

When the site stores a lead, the business wants controlled access, recovery, and retention, so personal data remains available only as long as needed.

#### Why

The form stores personal data in append-only JSONL outside the app root. Production backup/restore, access ownership, retention, and purge controls are not yet documented. The form doc recommends Hostinger MySQL or an external file location with backup.

#### Acceptance criteria

* Choose and document the system of record (MySQL or external file store) and accountable owner.
* Verify data persists through redeploy/restart and access is restricted to authorized operators.
* Demonstrate a backup and restore path and define retention, deletion/purge, and incident response.
* Document interim lead monitoring and response ownership while mail delivery is being finalized.
* Provide the approved storage, access, backup, and retention facts to the privacy-notice owner. This issue does not require the notice to be published.
* Define a deletion/purge procedure and test it against a non-production record without exposing personal data.

#### All-copy storage, IP and backup lifecycle (2026-10-29)

Enumerate every persisted copy and derived identifier: inquiry and delivery records, full outbox.jsonl message payloads including dry-run mode, IP/proxy data, mail queues, logs, exports, backups and replicas. Name system/owner/access roles, encryption and backup controls where applicable, retention/deletion/purge propagation, restore behavior and audit evidence. Prove deletion/recovery with synthetic records in an isolated fixture; deleting a primary JSONL row alone does not prove queued, logged or backed-up copies are removed. Include B2B application records if MUK-30 is selected.

#### Dependencies

Wave 0 active hosting identity; owner decision on retention and storage.

#### Sources

`docs/FORM-HANDLING.md` storage/protection section; `docs/PHASE-2-EXECUTION-LOG.md` open items.

#### WordPress form-data controls addendum (2026-10-29)

If WordPress is selected, include personal/business fields from Contact and custom-design forms at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. Never allow default GET submission. Define system of record, restricted access, retention/deletion, backup/recovery and audit evidence before live intake; test synthetic records in isolation and prevent PII in URLs, logs and artifacts.

### [MUK-16: Canonicalize apex and www and remove redirect chains](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When search engines or visitors reach alternate host and URL forms, they want one canonical destination, so the site avoids duplicate pages and redirect chains.

#### Why

The Phase 2 log says `www` serves the app rather than redirecting to the apex, and old trailing-slash URLs take a Next.js 308 followed by an app 301. Current host state first needs reconciliation.

#### Acceptance criteria

* After [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview) confirms the production domain, make HTTP and www variants redirect permanently to one HTTPS canonical host (apex per current docs) in one hop.
* Preserve valid TLS for apex and www throughout.
* Eliminate two-hop legacy slash normalization where feasible without breaking current paths.
* Verify redirect status, destination, canonical metadata, and sitemap host on the verified production domain.


* Verify the redirect is permanent and reaches the chosen canonical host in a single hop for HTTP, www, and trailing-slash variants.
* Check canonical metadata and sitemap URLs use the same approved host.

#### Dependencies

[MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview) current domain/deployment verification; approved canonical host.

#### Sources

`docs/PHASE-2-EXECUTION-LOG.md` open items; `docs/SEO-CHECKLIST.md` metadata and redirect sections.

### [MUK-17: Revalidate the WordPress redirect map against current URLs](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When a visitor follows an old WordPress URL, they want a relevant working destination, so migration does not strand them or waste search value.

#### Why

The redirect map was built from the old WordPress sitemap, and the docs report roughly 108 old URLs verified at the time. Ranking data was unavailable, and product pages redirect by shape rather than like-for-like stone.

#### Acceptance criteria

* Re-test every captured legacy sitemap URL on the confirmed production domain and record status plus final destination.
* Confirm high-value old URLs have a relevant final page; use Search Console data when available. If query data is not yet available, validate the sitemap-derived map, record the limitation, and schedule data-based prioritization during post-launch monitoring.
* Verify every intended permanent migration redirect ends at the expected 200 page, with no loops, invalid destinations, or temporary-host references.
* Record products that intentionally land on a shape-filtered catalog because their old stones no longer exist.
* Document known two-hop exceptions if they cannot safely be removed.
* Publish redirect-validation evidence after domain checks. Record unavailable query data for the post-launch review.

#### Dependencies

Requires a confirmed production domain. Use Search Console/Bing query data when present; if it is absent, complete sitemap-based validation and schedule prioritization during post-launch monitoring.

#### Sources

`DECISIONS.md` D-07; `docs/SEO-CHECKLIST.md` WordPress redirect section; `reports/wp/*.xml`.

#### Route-intent addendum (2026-10-29)

The current public site routes /shop/ and /engagement-rings/ to /diamonds. Preserve a source-to-destination table for every legacy route with the original intent, evidence of traffic/backlinks when available, relevant destination, response code, and rationale. Do not send ring/jewelry or trade-only routes to a generic loose-stone catalog/contact page without an owner-approved intent decision. This augments, and does not replace, the source inventory and redirect verification already required above.

### [MUK-18: Close technical SEO gaps on the confirmed production site](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview)<br>
**Blocks:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement)

#### Job story

When a crawler or social app reads a page, the business wants accurate metadata and structured data, so pages are indexed and represented correctly.

#### Why

The SEO checklist reports no default Open Graph image for non-stone pages, no Google Rich Results Test, and production robots/indexing should be rechecked after the domain conflict is resolved. The old WordPress `llms.txt` disposition is open.

#### Acceptance criteria

* Add a branded default OG/Twitter image for non-stone pages with correct metadata and absolute URLs.
* Run Google's Rich Results Test on representative catalog, stone, and article pages; fix blocking errors and record output.
* Verify canonical, sitemap, robots, noindex, JSON-LD, and host-specific robots behavior on the confirmed production URL.
* Record a keep/drop decision for legacy `llms.txt` and implement the approved outcome.
* Verify metadata and structured data on home, catalog, representative stone, guide, and contact pages.
* Record the result and fix or explicitly accept every blocking Rich Results and indexing issue.

#### Guide provenance, full-site claim surfaces and machine-readable outputs (2026-10-29)

Inspect home, featured cards, catalog, detail, guides and contact in rendered metadata and structured data, including sample-derived claims and item/report identities; a catalog-level disclosure does not cover homepage title/social/JSON-LD output. Where MUK-11 approves public reviewer/source/date fields, keep visible guide provenance and Article structured data consistent; omit unknown dates/authors instead of fabricating them.

Make an owner-approved keep/drop decision for legacy `llms.txt` and any future machine-readable catalog/content feed or API. A public feed is optional research, not competitor parity: do not expose it until MUK-6 establishes source control and MUK-8 verifies real, authorized inventory and public-field/rights rules. If selected, document scope, market, freshness, access/rate limits, privacy boundary, schema/version, and removal/update behavior. Do not infer demand or operational readiness from a competitor API.

#### Dependencies

[MUK-5](<https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview>) domain verification; approved brand direction/assets from [MUK-10](<https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence>).

#### Sources

`docs/SEO-CHECKLIST.md` Metadata, Structured data, Crawling, and Redirects sections.

#### Current code-scan addendum (2026-10-29)

For the Next.js app, sitemap.ts stamps lastModified with new Date() for every static page, article, and stone on each build; omit lastModified when content/data timestamps are unknown or emit source-backed timestamps. The stone Product Offer maps Memo to [schema.org](<http://schema.org>) PreOrder although no preorder promise/date is established. Verify an owner-approved availability mapping for Available, On Hold, Memo, Sold, and other supported states; do not claim PreOrder without an actual preorder policy. If WordPress remains the launch platform, also inspect rendered HTML for duplicate/conflicting Product JSON-LD from the theme, Rank Math, and WooCommerce before changing schema ownership.

#### Technology-page rendered SEO check addendum (2026-10-29)

If WordPress is selected and [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) retains a Technology page, include its owner-verified route in rendered guide/page checks. The source template `wp-content/themes/astra-child/page-technology.php` at origin/master `7596d48c6b13b533a0fd5ce7c34c47877476862b` has a hardcoded H1 but no page-specific metadata/schema implementation; plugins may provide output, so do not infer a rendered omission. Verify title, description, canonical, Open Graph, robots/indexability, JSON-LD ownership/conflicts and sitemap inclusion against approved page purpose and host. Do not publish or index an unapproved candidate route.

#### New WordPress page SEO handoff addendum (2026-10-29)

If MUK-25 selects WordPress and MUK-29 approves routes, include Contact, FAQ and Custom Jewelry candidates from origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839` in rendered title, description, canonical, Open Graph, indexability, schema and sitemap checks. Templates alone do not establish route assignment or prove metadata is missing; themes/plugins may supply it. Verify actual rendered output and avoid duplicate schema ownership.

### [MUK-19: Connect search properties and establish acquisition measurement](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site)<br>
**Blocks:** [MUK-24](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave), [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)

#### Job story

When the new site is live, the business wants verified search properties and measurement, so it can see discovery and fix important crawl gaps.

#### Why

Search Console/Bing sitemap submission and analytics ownership are open. The project lacks verified ranking and query data, so legacy redirect prioritization and organic acquisition baselines are limited.

#### Acceptance criteria

* Owner grants access to the correct Google Search Console and Bing Webmaster properties; verify ownership.
* Submit the current sitemap and record the accepted status and reported URL count.
* Capture available indexing, impressions, clicks, and top landing pages/queries; if a new property has no query data yet, record that limitation and continue without blocking launch.
* Decide whether GA4 or another analytics tool is needed; document the decision before adding scripts.
* Record analytics and script choices, processors, and cookie behavior for the privacy-notice owner. This issue does not require the notice to be published.
* Provide available top legacy landing-page data to the redirect review; schedule ongoing crawl-error monitoring separately after launch.

#### Dependencies

Requires a confirmed production domain, current sitemap/robots verification, and owner access. The four-week post-launch monitoring window is tracked separately.

#### Sources

`docs/PHASE-2-EXECUTION-LOG.md` open items; `docs/SEO-CHECKLIST.md` Crawling, redirects, Other.

#### Funnel-measurement addendum (2026-10-29)

Extend the measurement plan from search-property setup to the approved customer journey from [MUK-25](<https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction>)/[MUK-29](<https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix>). Define the minimal events and funnel for catalog search/filter, product-detail views, report/media engagement when present, qualified inquiry or checkout, and completion/error outcomes; name owners, source, retention, and privacy exclusions. Do not send names, email, phone, tax IDs, or message content as analytics event parameters. Establish baselines only after the owner selects approved tools and privacy requirements.

### [MUK-30: Establish the approved trade buyer journey from application to quote or order](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority:** High · **Wave:** 2 — Production Operations & SEO

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) platform and audience decision; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) inventory contract; [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) approved inventory and [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) validation; [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock lifecycle; [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) approved product evidence; [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) market and commercial terms; [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection) privacy notice, [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection) production bot protection, [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls) lead-data controls, and [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end) mail delivery for live intake. [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts) is required if the selected trade path uses the WordPress finder or PLP.

**Job story:** When a jeweller is sourcing stones for a customer or their own inventory, they want to verify their trade account, search trustworthy available stones, and receive an accurate quote or order path, so they can purchase with clear terms and no unauthorized price or stock exposure.

**Platform gate:** Read-only planning, owner-input collection, and test design can proceed before [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). Do not change WordPress code/configuration, deploy it, access production data, or call production services unless [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects or retains WordPress. If another platform is selected, retarget this issue and update its source paths, evidence, runtime/setup, acceptance criteria, and tests to deliver the same outcome there. A migration/retirement note alone is not delivery. Close only after the retargeted outcome is delivered, or an owner-approved retirement is implemented and verified on the selected platform.

**Source context at** `origin/master` **commit** `b993fc92`**:** `wp-content/themes/astra-child/inc/b2b-portal.php:16–104` collects company, business type, tax ID, and phone, then records a pending account; `:109–148` applies hardcoded tier discounts; `:151–315` provides a B2B dashboard; `:317–374` parses uploaded CSV rows and adds matching products to cart. This shows existing design intent, not approved eligibility, pricing, holds, terms, or production operation.

**Scope:** Deliver the owner-selected application/review → catalog search → verified stone → quote or checkout journey. Enforce trade price and feature visibility server-side across pages, cart, order totals, and any selected API/feed. Use [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s data contract and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior)’s availability. Show approved evidence or a clear unavailable state. Do not invent discounts, eligibility, credit, payment, export, shipping, tax, or reservation terms. This issue owns trade-application/account privacy, consent and security requirements; extend [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)–15’s approved shared notice, abuse protection, delivery and data controls to business/contact/tax fields. No live intake before the required field map, market, purpose, notice/consent, recipients, access, retention and security handling are owner-approved and verified.

**Owner handoff:** Decide qualifying jeweller types/markets and evidence; pending/approved/denied/suspended states; quote-only versus checkout; tiers, pricing, currency, exceptions; whether quotes hold stock and for how long; approved payment, cancellation/refund, fulfillment and customer-update ownership if checkout is selected; market terms and visible product fields. Provide synthetic scenarios only, never production customer data or credentials.

**Acceptance criteria:**

1. The approved state model defines permitted actions for applicant, pending, approved, denied, suspended, and any approved trade tiers.
2. Anonymous and unauthorized states cannot see trade prices or invoke trade actions through pages, direct URLs, cached pages, cart requests, or selected APIs.
3. Every approved quote uses a server-calculated price snapshot that records its inputs, currency, and applicable terms; a client-submitted amount is never authoritative. Catalog/cart/order amount parity is required only when checkout is selected. Use only owner-approved pricing rules.
4. Search uses approved filters and inventory; availability follows [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior). Results show [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence)-approved evidence or explain what is unavailable.
5. No payment, cart, checkout, or inventory hold is implied by a quote. An inventory hold exists only if explicitly approved, time-bounded, and enforceable under [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) and [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow). If direct checkout is selected, [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) terms must be approved first; test server-calculated amount, order states, sandbox payment, and approved stock/hold behavior.
6. The application endpoint validates nonce and fields server-side, cannot self-approve or grant roles, and defaults to pending. The CSV path is restricted to authorized users and checks capability/nonce, upload errors, allowlisted type, size and row limits, expected columns, positive quantities, stock/purchasability, and reports row failures without silent partial success.
7. Real intake remains disabled until applicable [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), and [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end) prerequisites pass. This issue records the additional B2B consent/retention and threat-review decisions; do not depend on unnamed companion work. Test synthetic consent/notice versions, least-privilege roles, document visibility, retention/deletion, replayed application requests and sanitized audit logs.
8. The journey works by keyboard and at agreed mobile/desktop viewports; errors and empty states do not expose restricted information.
9. If the platform changes, retarget and complete the selected-platform outcome; do not close this issue on a disposition note alone.

**Verification and tests:** Add `composer test:trade-journey` to the shared WordPress fixture harness described below. Test synthetic accounts in every state, direct access attempts, a server-calculated quote snapshot with synthetic products, checking retained inputs/currency/terms; catalog/cart/order price parity only if checkout is selected; available/held/sold/unavailable stock; CSV invalid/oversized/malformed rows; and quote-only versus selected-checkout behavior. Use local Mailpit only for test mail. Checkout tests, if selected, use synthetic orders and payment sandbox flows. No production data, credentials, external SMTP, or live payments.

**Deliverables:** Approved state/journey and commercial decision record; implementation of only the selected path; fixture tests; setup notes; and an operator guide for account approval and quote/order status.

##### Shared WordPress test harness

Reuse one fixture-only sandbox at tests/wordpress/; do not create a separate test environment per issue. MUK-25 records the one-time bootstrap owner; only that selected issue creates the harness, while every other task consumes it. The owner documents setup/teardown in tests/wordpress/README.md and tests/wordpress/compose.yaml. Pin WordPress and WooCommerce versions from the selected source, the deployment-approved PHP minor, database, PHPUnit, and Mailpit. Use synthetic users/products and a disposable database. Block outbound network except an explicitly approved payment sandbox for [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) when checkout is selected. Route all email to local Mailpit. Never use production data, credentials, SMTP, or real recipients.

Setup and teardown: docker compose -f tests/wordpress/compose.yaml up -d --wait; run composer install --no-interaction and this issue's documented suite; then docker compose -f tests/wordpress/compose.yaml down --volumes. Run `bash validate-repo.sh` and php -l on each changed PHP file. These syntax/repository checks do not replace the behavioral suite.

### [MUK-31: Deliver the owner-selected direct-to-consumer discovery-to-order journey](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority:** High · **Wave:** 2 — Production Operations & SEO

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) platform/audience decision; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) product/inventory contract; [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) approved products, [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) validation, [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) availability lifecycle; [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) mandatory commercial/legal terms per market and flow; [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) only for any optional approved product media/report; [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection) privacy notice, [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection) production bot protection for public submission paths, [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls) lead-data controls, and [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end) delivery for inquiries/customer notices.

**Job story:** When an individual shopper considers a diamond or jewellery piece, they want to understand its verified details, full cost, delivery and after-sales terms, and next purchase step, so they can decide confidently without false or incomplete promises.

**Platform gate:** Read-only planning and owner-input collection can proceed before [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). No WordPress code/configuration changes, deployment, production-data access, or production-service calls until [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects or retains WordPress. If another platform is selected, retarget the issue and update source references, setup, acceptance criteria, and tests to deliver the outcome there. A migration/retirement note alone is not delivery; retirement requires owner approval and verification that the path is removed or disabled on the selected platform.

**Source context at** `b993fc92`**:** `wp-content/themes/astra-child/assets/js/jewelry-builder.js:9–60, 156–205, 237–287, 308–390` contains a four-step customizer with client-side selections/prices, placeholder 3D preview, and save/share/cart actions. `wp-content/themes/astra-child/inc/ajax-handlers.php:258–275` returns a success response/cart URL without adding a cart item. The builder formats prices with `$` at `jewelry-builder.js:279–287`; WooCommerce currency is set to USD in `wp-content/themes/astra-child/includes/class-lgd-automator.php:124–140`; checkout fields are customized in `wp-content/themes/astra-child/functions.php:467–477`. This does not establish that the owner wants a ring builder or online checkout.

**Scope:** First select the offer and path: loose stones, finished jewellery, approved custom options, inquiry/quote, checkout, or a bounded combination. Implement only that selection. Calculate authoritative totals server-side. Use [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock rules. Product media is optional and may appear only when [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) approves its provenance, rights, and exact product mapping; otherwise show an accessible no-media state. Do not assume a ring builder or invent market, legal, tax, shipping, payment, delivery, return, warranty, or resizing promises.

**Owner handoff:** Supply the approved products/options, markets/currency, tax/shipping/export terms, payment provider/sandbox owner if checkout is selected, stock and hold rules, [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) legal/operational policy matrix, return/refund/cancellation/warranty/resizing terms, inquiry owner/response commitment, and approved contact/privacy copy. Pending [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) terms block checkout and public commercial promises.

**Acceptance criteria:**

1. An owner-approved journey diagram identifies supported products/options. [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) records legal and operational approval for every public commercial promise before checkout or delivery promises are enabled.
2. The selected path preserves product ID, specifications, and selected options through to the confirmed next step.
3. Displayed currency, tax, shipping, and total follow approved terms; client-side values are never authoritative.
4. If checkout is selected, cart/order values and stock are revalidated at approved lifecycle points. Hold/reserve stock only if [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) and [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) approve it, and release it per approved expiry, failure, cancellation, and timeout rules. Verify sandbox payments and signed/idempotent webhooks, including invalid, duplicate, and replayed events. Test payment decline/timeout, cancel/refund, fulfillment failure, and customer-update failure/retry against the approved order-state map.
5. If inquiry is selected, submission retains product ID, options, and price context, returns an explicit receipt/next step, and implies no payment or stock reservation.
6. If the ring builder is not approved, remove/disable its entry points and any false “add to cart” success. If approved, each option creates a server-validated cart item and price.
7. Policy links follow [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow). Media appears only when [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence) approves the exact asset/product mapping. Missing policy/evidence is clearly unavailable or pending, never inferred.
8. The path works by keyboard, screen reader, and agreed mobile/tablet/desktop sizes; loading, validation, payment, stock, and submission errors are actionable.
9. A platform change requires retargeting this issue and updating source refs, setup, acceptance criteria, and tests; a migration note alone cannot close it.

**Verification and tests:** Add `composer test:d2c-journey` to the shared fixture harness. Test options, price/tax/shipping arithmetic, stock changes, unavailable items, and client/server price mismatch. If checkout is selected, test sandbox success/decline/timeout/retry, duplicate submissions, signed/invalid/duplicate/replayed webhooks, hold/release if approved, cancellation, refund, fulfillment exception, and customer-update failure/retry. Use synthetic users and payment sandbox webhooks only. Route email to local Mailpit; block production/live endpoints and external SMTP. If inquiry is selected, test valid/invalid submissions and preserved options. Run accessibility/responsive checks and `bash validate-repo.sh` plus `php -l` on changed PHP files.

**Deliverables:** Owner-approved offer/journey; selected-path implementation; fixture tests; and operator notes for order or inquiry follow-up.

#### D2C order-data and support controls (2026-10-29)

If checkout is selected, approve an order/customer data flow before accepting orders: fields/purpose, payment processor and tokenization boundary (never store card secrets), fulfillment/support recipients, least-privilege roles, access/audit trail, retention/deletion/privacy-request path, incident escalation and backup/recovery. Align checkout, return/refund/shipping and response promises to MUK-28 and named MUK-21 operators. Test synthetic orders, refunds/cancellations and failed/replayed payment webhooks in the approved sandbox with idempotent recovery. If inquiry-only is selected, do not implement or imply payment/order collection.

##### Shared WordPress test harness

Reuse one fixture-only sandbox at tests/wordpress/; do not create a separate test environment per issue. MUK-25 records one bootstrap owner; the selected issue there creates and documents the harness, while all other WordPress tasks consume it and report a blocker to that owner if absent. Pin WordPress/WooCommerce versions from the approved source and deployment profile, the approved PHP minor, database, PHPUnit, and Mailpit. Use synthetic users/products and a disposable database. Block outbound network except an explicitly approved payment sandbox for [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) when checkout is selected. Route all email to local Mailpit. Never use production data, credentials, SMTP, or real recipients.

Setup and teardown: docker compose -f tests/wordpress/compose.yaml up -d --wait; run composer install --no-interaction and this issue's documented suite; then docker compose -f tests/wordpress/compose.yaml down --volumes. Run `bash validate-repo.sh` and php -l on each changed PHP file. These syntax/repository checks do not replace the behavioral suite.

#### Custom Jewelry route and D2C flow addendum (2026-10-29)

If WordPress and a custom-jewelry/D2C offer are selected, include `page-custom-jewelry.php` and its stylesheet at origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`. The homepage source links `/custom-jewelry-builder/`, but its CMS page/live route is unverified. The design form at `:33–164` lacks action/method/handler; default GET could put name/email/design fields in the URL. Never enable that. If selected, deliver a secure server-handled inquiry flow with MUK-12–15 controls, clear state/retry, no implied order/reservation, and local synthetic tests. Existing `jewelry-builder.js` targets different markup; the separate cart AJAX handler reports success without adding a cart item. Do not claim checkout/cart success. Align options to MUK-26, substantiate ethical sourcing/testimonials/placeholders through MUK-10/MUK-27, audit radio-group semantics, focus, contrast, 320px/200% zoom, and test stylesheet-in-head/computed styles. MUK-29 approves route/purpose; MUK-18 verifies rendered SEO.

### [MUK-32: Align homepage and WooCommerce diamond filter contracts](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority:** High · **Wave:** 2 — Production Operations & SEO

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) platform decision; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) approved field/filter contract; [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory) approved inventory and [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check) validation; [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock lifecycle. If trade buyers are in scope, consume the owner-approved trade permission/price-visibility matrix as an early [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) planning input; it can be approved before [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) implementation, so [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts) does not depend on [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) completion. [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote)'s integrated trade-journey verification is downstream of [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts).

**Job story:** When a buyer filters diamonds, they want the visible controls, URL, result count, and products to agree, so they can narrow and revisit the same catalog results.

**Platform gate:** Read-only planning and test design may proceed before [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction). Make no WordPress code/configuration changes, deployment, production-data access, or service calls until [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects or retains WordPress. If it selects another platform, retarget the issue and update paths, evidence, setup, acceptance criteria, and tests. Migration documentation alone is not delivery; verify the selected-platform filter outcome or owner-approved retirement.

**Source context at** `b993fc92`**:** `wp-content/themes/astra-child/front-page.php:107–184` submits `shape`, `carat_range`, `color`, `clarity`, `price_range`, and `lab`. `wp-content/themes/astra-child/inc/diamond-filters.php:14–28, 31–185` reads `shape`, `carat_min/max`, `price_min/max`, `color`, `clarity`, `cut`, `certification`, and `availability`. `wp-content/themes/astra-child/woocommerce/archive-product.php:59–207` submits `diamond_shape`, `diamond_color`, `diamond_clarity`, `diamond_cut`, `diamond_lab`, `diamond_fluorescence`, `in_stock`, and `has_certificate`; `wp-content/themes/astra-child/assets/js/plp.js:92–185` serializes some of those keys. `wp-content/themes/astra-child/inc/ajax-handlers.php:29–96` counts only a subset and omits price, certification, availability, fluorescence, and certificate-presence filters.

**Scope:** Use [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s owner-approved field dictionary as the single contract for homepage, PLP, query, count, URL, and pagination. Enable only owner-selected contract-supported filters. Remove unsupported controls or disable them with an explanation. Use [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) stock behavior and the owner-approved trade permission matrix from [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) planning where applicable. [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts) is not blocked on [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) implementation; [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote)'s integrated trade journey test follows [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts). Do not add filters or change field semantics without owner approval.

**Owner handoff:** Confirm canonical fields, values, units/currency, supported public/trade filters, multi-select behavior, and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) visibility states. Provide synthetic products spanning supported values and private/trade-only and stock states.

**Acceptance criteria:**

1. Homepage and archive controls submit the canonical keys/values; server parsing matches. Legacy URLs are normalized or supported as documented.
2. Every enabled owner-selected [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) filter works independently. Unsupported source controls, including lab, fluorescence, in-stock, or certificate-present when absent from the contract, are removed or disabled rather than pretending to work.
3. Combined filters follow documented selection logic; distinct attributes intersect as approved.
4. Open-ended ranges, invalid/reversed values, unknowns, and empty ranges behave safely.
5. Result IDs, counts, and pagination agree. Count/query use the same access policy and filters; counts do not expose trade-only inventory. Trade-price visibility follows the owner-approved permission matrix supplied during [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) planning; stock status follows [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior).
6. Apply, reset, back/forward, refresh, and direct URL entry restore the same state/results.
7. Labels and counts use [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)-approved units/currency; tests contain no production values.
8. Empty/loading/error states are accessible and usable by keyboard/mobile.
9. If platform selection changes, retarget and deliver the filter outcome there; do not close on a migration note alone.

**Verification and tests:** Add `composer test:diamond-filters` to the shared harness. Using synthetic fixtures, assert each enabled filter, combinations, ranges, malformed values, reset, deep links, pagination, and count/query parity. Include negative tests for unsupported controls and counts across authorized/unauthorized user states. Run only in the pinned isolated sandbox with outbound network blocked, plus `bash validate-repo.sh` and `php -l` on changed PHP files. Do not read production products or connect to the production database.

**Deliverables:** Canonical filter/URL contract; homepage, PLP, query, and count implementation; fixture tests; and importer notes.

##### Shared WordPress test harness

Reuse one fixture-only sandbox at tests/wordpress/; do not create a separate test environment per issue. MUK-25 records one bootstrap owner; the selected issue there creates and documents the harness, while all other WordPress tasks consume it and report a blocker to that owner if absent. Pin WordPress/WooCommerce versions from the approved source and deployment profile, the approved PHP minor, database, PHPUnit, and Mailpit. Use synthetic users/products and a disposable database. Block outbound network except an explicitly approved payment sandbox for [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) when checkout is selected. Route all email to local Mailpit. Never use production data, credentials, SMTP, or real recipients.

Setup and teardown: docker compose -f tests/wordpress/compose.yaml up -d --wait; run composer install --no-interaction and this issue's documented suite; then docker compose -f tests/wordpress/compose.yaml down --volumes. Run `bash validate-repo.sh` and php -l on each changed PHP file. These syntax/repository checks do not replace the behavioral suite.

### [MUK-35: Require a matching contact detail for the selected inquiry channel](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority / wave:** High / Wave 2 — Product hardening.

**Job story:** When a buyer chooses how the team should contact them, they want to provide a usable detail for that channel, so the team can follow up as promised.

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects the platform and product direction. If Next.js is retained, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes its source before implementation. Consume [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow)’s approved channels and service promises, [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls)’s lead-data controls, [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection)’s verified live protection, and [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection)’s privacy notice as applicable. [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel) blocks [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) and [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services). [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end) delivery evidence may be reused only if its internal-only test was separately authorized. [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel) itself uses mocks or a local sink only.

**Evidence:** `D:\Projects\labgrowndiamondcvd\src\components\InquiryForm.tsx:48-63` labels phone optional while offering Email, Phone, and WhatsApp. `D:\Projects\labgrowndiamondcvd\src\app\actions\inquiry.ts:120-134` validates phone syntax only when supplied, does not require it for Phone or WhatsApp, and accepts the channel independently. Lines 156-160 store and notify the selected channel.

**Scope:** Implement only the channels [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) approves. Use the owner-approved supported default; do not assume Email is supported or default. Remove unsupported choices from the UI and reject unsupported values server-side. Require a valid phone number for every offered Phone or WhatsApp choice. Require the matching contact detail for every other approved channel. Server validation is authoritative. Store only the validated channel and matching detail.

**Out of scope:** WhatsApp API or CRM integration, marketing consent, real-recipient testing, provider credential changes, or guaranteeing that a phone number is reachable.

**Owner inputs:** [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) must identify supported channels, the supported default, channel-specific response promises, and required contact details. Confirm accepted countries and phone formats, whether a country code is mandatory, and privacy wording. Missing inputs block implementation; do not invent service promises.

**Acceptance criteria:**

1. The UI presents only [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow)-approved channels and uses the approved default.
2. The server rejects missing, malformed, or unsupported channel values, including requests that bypass the UI.
3. Every offered channel requires its owner-approved matching detail. Phone and WhatsApp choices each require a valid phone number.
4. The client shows the matching requirement and accessible field errors. Client-side validity does not replace server validation.
5. The channel and contact detail agree in the stored synthetic lead and mocked notification and confirmation copy.
6. Invalid submissions do not reach storage or mail.
7. Tests use no real recipients or production data.

**Fixtures/tests:** Table-driven tests from the [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) channel contract. Cover supported and unsupported choices, the approved default, absent/valid/malformed details, whitespace, international phone formats, and direct server-action bypass. UI tests cover selection changes, conditional requirements, inline error association, and announcements. Server-action tests use mocked storage and mail and assert neither is called for invalid input.

**Deliverables:** Updated inquiry form and action, reusable validation if useful, regression tests, and an approved channel/format contract linked from form documentation. Keep secrets and personal data out of fixtures.

**Done when:** Platform gates and [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow) inputs are satisfied, and targeted isolated UI and server tests pass. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) may incorporate the tests later but is not a completion prerequisite. [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) verifies deployed behavior after this issue is complete.

### [MUK-36: Validate numeric catalog filters and explain invalid ranges](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges)

**Status:** Backlog · **Priority:** Medium · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history)<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority / wave:** Medium / Wave 2 — Product hardening.

**Job story:** When a buyer filters the catalog by numeric fields, they want valid bounds and clear feedback, so the result count reflects their intended range.

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects the platform. If Next.js is retained, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes the source. [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) defines product fields, units, selected currency, and numeric precision. [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts) is the WordPress alternative. [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges) blocks [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) and [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services).

**Evidence:** `D:\Projects\labgrowndiamondcvd\src\components\Catalog.tsx:41-49,58-76,104-111` stores bounds as strings, converts them with `Number()`, and compares without finite-value or range validation. A nonnumeric value becomes NaN and silently excludes every row. There is no min/max ordering or accessible error state.

**Scope:** Retain this issue only for the Next.js catalog. Validate optional numeric bounds using [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s field, unit, currency, and precision contract; do not hard-code USD or integer prices. Treat whitespace-only input as empty and numeric zero as an explicit bound. Validate finite values, domain-appropriate non-negative bounds, allowed precision, and minimum ≤ maximum. Show accessible field-specific errors and define behavior while input is invalid. Do not silently present invalid input as “no matches.” Reset clears values and errors.

**Out of scope:** New filters or search facets, a server-side catalog API, changing inventory values, localization or currency conversion, and URL persistence unless separately approved.

**Owner inputs:** Use [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s approved fields, units, currency, precision, and zero-bound semantics. Confirm whether locale grouping separators are accepted or normalized. Do not choose a currency or precision independently.

**Acceptance criteria:**

1. Whitespace-only bounds are treated as omitted; numeric zero remains explicit.
2. Valid values follow [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s units, selected currency, and precision.
3. Reject unsupported syntax, non-finite or negative values, excess precision, and reversed ranges.
4. Invalid input is associated with its field, marked invalid, and announced. It is not presented as a valid zero-result query.
5. Valid filters compose with shape, color, clarity, and sorting.
6. Reset clears values and errors.
7. Mobile card results and desktop table results remain consistent and show the same count.

**Fixtures/tests:** Use a pure validation matrix based on [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s contract. Cover whitespace, omitted values, zero, a valid fractional bound, alphabetic input, non-finite input, exponent notation, negative values, excess precision, and minimum greater than maximum. Component tests cover combinations, reset, and accessible error announcements. Browser checks at 1440×900 and 390×844 verify there is no NaN or false-empty state. Do not write live inventory.

**Deliverables:** Filter parsing and validation, input constraints and accessible inline feedback, targeted tests, and documentation of the [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) numeric contract. Do not alter sample catalog data.

**Done when:** Platform gates and [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s contract are satisfied, and targeted isolated tests pass with no regression to homepage shape links or valid filters. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) may incorporate these tests later but is not a completion prerequisite.

### [MUK-37: Keep keyboard and assistive-technology focus inside the inquiry modal](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority / wave:** High / Wave 2 — Accessibility hardening.

**Job story:** When a keyboard or screen-reader user opens a stone inquiry dialog, they want to interact with it without losing their place in the catalog, so they can submit or close the inquiry safely.

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects the platform. If Next.js is retained, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes the source. [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal) blocks [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) and [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services); neither blocks completion of [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal).

**Evidence:** `D:\Projects\labgrowndiamondcvd\src\components\Catalog.tsx:197-212` focuses an element, closes on Escape, prevents background scrolling, and restores prior focus. It does not trap Tab/Shift+Tab or make the background inert or hidden, yet marks the dialog `aria-modal="true"` at line 210.

**Scope:** Implement a conformant modal interaction: focus enters the dialog; Tab and Shift+Tab remain inside; background UI is inert to keyboard and assistive technology while open; Escape and a visible close control dismiss it. Restore pre-existing scroll, inert, and hidden states on close. Return focus to the invoking control, or to a documented surviving fallback if that control was removed or disabled. Provide an accessible name and description.

**Out of scope:** Redesigning the catalog, changing inquiry delivery, adding modal fields, or using real customer data in screen-reader testing.

**Owner inputs:** None beyond confirming the existing inquiry dialog remains the intended flow. Follow WAI-ARIA modal dialog behavior.

**Acceptance criteria:**

1. Opening from a table or card Inquire button moves focus into the dialog.
2. First and last focusable controls wrap focus in both directions; background controls cannot receive focus while open.
3. Background inert/hidden state excludes background content while leaving the dialog exposed in the accessibility tree.
4. Escape and visible close dismiss the dialog. Background-click behavior is explicit and tested.
5. Closing restores focus to the invoking button, or the documented fallback if it disappeared or became disabled. Prior scroll, inert, and hidden states are restored exactly.
6. Failed and successful form states remain keyboard operable.
7. No focus trap or hidden background remains after close.

**Fixtures/tests:** DOM-level keyboard tests cover initial focus, both wrap directions, Escape, close, trigger removal or disablement, fallback focus, and exact state restoration. Browser E2E opens the dialog through desktop-table and mobile-card triggers. Run axe or equivalent and assert the background is excluded from the accessibility tree, with the dialog still exposed; alternatively record a screen-reader check. Record browser/version for manual keyboard review. Use no PII.

**Deliverables:** Accessible modal implementation, targeted regression tests, and a short interaction note in the app’s UI/accessibility docs.

**Done when:** Platform gates are satisfied and targeted keyboard/accessibility tests pass. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) may integrate the tests later; [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) may consume the evidence, but neither is a completion prerequisite.

### [MUK-38: Publish a route-accurate sitemap with trustworthy modification dates](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview), [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority / wave:** High / Wave 2 — Technical SEO.

**Job story:** When a crawler reads the sitemap, it wants only canonical pages that exist and honest modification dates, so it can crawl the intended site efficiently.

**Dependencies:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects the platform. If Next.js is retained, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes the source. Consume [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site)’s canonical/indexability policy, [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s timestamp provenance, [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)’s approved page inventory, [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains)’s canonical-host rule, and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior)’s item lifecycle. [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates) blocks [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks). [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) verifies production-served XML after launch; that check does not block completion. [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health) monitors post-launch.

**Evidence:** `D:\Projects\labgrowndiamondcvd\src\app\sitemap.ts:7-16` assigns the current build time as `lastModified` to every page, article, and stone, despite no `updatedAt` source field in `src/lib/articles.ts` or `src/lib/diamonds.ts`. The current route list is not checked against [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)’s approved page inventory. `src/app/robots.ts:4-7` derives the sitemap origin from site configuration and has a staging noindex branch.

**Scope:** Retain only if [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects Next.js. Derive the canonical, indexable sitemap set from [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)’s approved page inventory and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior)’s item lifecycle. Remove build-clock timestamps. Use [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s timestamp provenance and omit unknown dates. Validate local and preview XML against [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site) policy and approved host configuration. Separate production expectations from staging expectations: production uses the approved canonical origin; staging retains its noindex/disallow behavior, including any Hostinger robots override. Inspect rendered robots directives and page canonical/indexability, not only HTTP status. [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) owns production-served XML and robots verification; [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health) owns monitoring.

**Out of scope:** Keyword selection, sitemap submission, changing redirects, content production, inventing publish dates, or exposing staging URLs to search engines.

**Owner inputs:** [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site) supplies canonical/indexability policy; [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) identifies authoritative timestamps; [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) supplies the approved page inventory; [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains) supplies canonical scheme/host; [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) defines item lifecycle. Omit `lastModified` if a source timestamp is unavailable.

**Acceptance criteria:**

1. Under a local production-config build, sitemap targets return 200, self-canonicalize to the approved production URL, and have no blocking robots directives. Separately validate actual preview/staging against its approved noindex/disallow policy; noindex there is expected, not a failed production sitemap test.
2. Static pages and approved articles from [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) appear exactly once.
3. Product URLs follow [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior), including its unavailable-item policy. Do not emit removed, redirect-only, or sample items for a real-inventory release.
4. Exclude query-filtered URLs, image routes, and staging hosts.
5. `lastModified` uses only [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)-approved source timestamps. Omit unknown dates; never synthesize them from build time.
6. Production configuration uses the approved sitemap origin and canonical policy. Staging configuration separately retains the app’s noindex/disallow behavior and records any host robots override.
7. Deterministic tests fail on duplicate, noncanonical, missing, redirected, non-indexable, or fabricated-date entries.
8. [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) verifies production-served XML/robots after launch; [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health) monitors post-launch.

**Fixtures/tests:** Derive the fixture route set from [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)’s approved inventory, not hard-coded illustrative counts. Use synthetic inventory spanning available, held, sold, and removed states, plus fixed [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)-provenance dates. Unit tests compare routes and dates to the fixture. Local/preview checks inspect XML, rendered canonicals, and robots directives against approved host configuration without DNS changes or production dependency.

**Deliverables:** Sitemap generation change, deterministic tests, [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)-derived route fixture, and local/preview evidence for XML, canonical metadata, and robots behavior. Hand production-served verification to [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) and monitoring to [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health).

**Done when:** Platform/source and [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix), [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains), and [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) inputs are satisfied and targeted local/preview tests pass. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) may incorporate the tests later but is not a completion prerequisite.

### [MUK-40: Integrate the approved technology guide with accessible responsive delivery](https://linear.app/mukund-ajmera/issue/MUK-40/integrate-the-approved-technology-guide-with-accessible-responsive)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) when WordPress and this guide are retained

#### Job story

When a visitor wants to understand CVD diamonds, they want a reachable, readable, and accessible guide with clear connections to related education, so they can find the right information without encountering a misleading or broken experience.

#### Platform and publication gates

Read-only planning may happen before platform selection. Do not change WordPress code, deploy, or access production data/services until MUK-25 selects or retains WordPress and MUK-29 approves the page's purpose, disposition, route, and inbound relationship. MUK-29 decides whether this page and `page-education.php` coexist, are consolidated, or one is deferred/retired.

MUK-11 and MUK-27 own technical claim review and approved copy. They gate publication of affected content, but do not block independent template work. Approved interface labels, captions, and accessibility text may change; do not change factual claims here. Use the approved content version, and withhold claims still pending disposition at publication. MUK-18 owns rendered metadata, canonical, indexability, and schema checks; it consumes the selected route but does not block this implementation. If MUK-25 selects another platform, retarget the issue with refreshed evidence, setup, criteria, and tests; a migration note alone is not delivery.

#### Source context

Source-only evidence at `origin/master` commit `7596d48c6b13b533a0fd5ce7c34c47877476862b`:

* `page-technology.php:8–11` calls `get_header()` before enqueueing the technology stylesheet. `header.php:21` calls `wp_head()`; the regular conditional stylesheet path is in `functions.php:25–58`. WordPress 6.9 may hoist late styles, so test rendered placement and computed style; source order alone does not prove a runtime flash/layout shift.
* `page-technology.php:36–58` calls four static numbered `div` cards “Interactive,” but defines no controls or interaction.
* Comparison tables are at `page-technology.php:79–110, 116–197`; wrappers/minimum width are styled in `assets/css/technology.css:153–162`. The source lacks captions/explicit header scopes; choose semantics based on actual data.
* `.highlight-green` at `technology.css:321–324` is used on white cards for comparison text; verify rendered contrast for its actual text size. The source alone does not establish whether normal- or large-text thresholds apply.
* `page-education.php:3, 21–33, 61–64, 98–145` already covers CVD/HPHT, with conflicting temperature statements. MUK-11/MUK-27 own claim reconciliation.
* Header navigation is CMS-configured at `header.php:68–78`; the source fallback does not include this guide. CMS page assignment and live menu/route state were not inspected, so source does not prove the page is live or orphaned.
* The template has no page-specific metadata/schema code; theme/SEO plugins may emit it. MUK-18 owns rendered SEO verification.

#### Scope and boundaries

After MUK-29 approves page purpose/location, implement the approved inbound path without assuming it belongs in primary/footer navigation or a related-guide link. Enqueue the stylesheet conditionally through `wp_enqueue_scripts` with documented handle, dependencies, and cache-version source. Label the stages truthfully as static or implement an owner-approved real interaction. Fix applicable contrast, table semantics, contained horizontal scrolling, responsive layout, focus, and reduced-motion behavior. Do not approve/rewrite claims or implement SEO metadata/schema.

#### Owner inputs and handoff

The owner confirms page disposition/purpose, page assignment and slug/path, inbound link locations, and whether the four-stage content remains static. MUK-11/MUK-27 provide the approved content version/dispositions; MUK-18 receives the selected rendered route for SEO checks. No affected content is published until approvals are recorded.

#### Acceptance criteria

1. No WordPress code change begins until MUK-25 selects/retains WordPress and MUK-29 approves disposition, purpose, route, and inbound relationship, including how the page relates to `page-education.php`.
2. The approved route works for logged-out visitors. Its inbound link works on desktop and mobile using a CMS-menu or selected-entry-path fixture; do not add an unapproved path.
3. Enqueue from `wp_enqueue_scripts` conditionally for this page. Document stylesheet handle, dependencies, and cache-version source. A rendered check asserts exactly one stylesheet link appears in `<head>` before the page body and computed styles apply.
4. The stage heading accurately describes static content unless an owner-approved interaction is implemented. Interactive controls work by keyboard and expose purpose/state to assistive technology; visible focus and reduced-motion behavior are covered where relevant.
5. Each table has a useful caption and associated column headers; use row headers where they help identify rows. If a narrow viewport requires horizontal scroll, the contained region has an accessible name, keyboard scrolling, and visible focus.
6. Normal text contrast is at least 4.5:1, large text at least 3:1, and applicable controls/focus indicators at least 3:1. Verify rendered sizes/states, including green text on white cards.
7. At 320 CSS-pixel width and 200% text zoom, content/controls remain usable. Agreed desktop/mobile viewports have no unintended page-level overflow, clipping, or unusable controls. Contained scrolling is allowed for two-dimensional tables.
8. Do not add or alter factual claims. Published copy matches the recorded MUK-11/MUK-27-approved version; pending claims remain withheld. Accessibility labels, captions, and non-factual interface text may change.
9. The guide is reachable from its MUK-29-approved entry point and links to the approved related education page without duplicating its purpose.
10. Hand the selected route to MUK-18 for title, description, canonical, indexability, Open Graph, sitemap, and schema ownership/conflict checks. MUK-18 does not block MUK-40; MUK-40 adds no competing schema.

#### Verification and tests

Run `php -l wp-content/themes/astra-child/page-technology.php` and `bash validate-repo.sh`. Use only the shared isolated WordPress fixture harness under `tests/wordpress/` with its single bootstrap owner recorded in MUK-25. If absent, block and update that owner; do not create another environment. Test the selected route, desktop/mobile inbound path, stylesheet placement/computed styles, static/interactive behavior, table associations, keyboard scrolling, focus, contrast, 320 CSS-pixel layout, 200% zoom, and reduced motion as applicable. Include an automated accessibility report and manual keyboard/screen-reader check. Save sanitized evidence. Render only in an isolated WordPress sandbox with synthetic page/menu fixtures and blocked production integrations; do not infer live route/SEO from source.

#### Deliverables and done when

Deliver the approved route/menu implementation, accessible responsive page/tables, correctly timed stylesheet, fixture/bootstrap and commands, sanitized evidence, and rendered-route handoff to MUK-18. Done when the platform/page gates pass, local checks pass on the selected source, required copy approvals are recorded before publication, and the SEO handoff is complete. No production change is included.

### [MUK-41: Deliver the approved WordPress contact flows safely end to end](https://linear.app/mukund-ajmera/issue/MUK-41/deliver-the-approved-wordpress-contact-flows-safely-end-to-end)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-28](https://linear.app/mukund-ajmera/issue/MUK-28/confirm-customer-policies-and-operational-promises-by-market-and-flow), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) if WordPress/contact flows are retained

#### Job story and platform gates

When a visitor needs help, a custom design, a wholesale conversation, or a virtual inspection, they want to send a request safely and know what happens next, so they can contact the business without exposing personal information or receiving an unapproved promise.

Do not change WordPress code until MUK-25 selects/retains WordPress, MUK-29 approves the Contact page disposition/route/purpose/inbound path, and MUK-28 approves the contact modes, markets, business details and response promises in scope. MUK-12–15 govern privacy, abuse protection, delivery and storage and gate live intake; isolated synthetic implementation tests may proceed. MUK-21 owns operator assignment/follow-up. MUK-30 owns any selected trade-application flow; do not build another trade account/pricing system here. If WordPress or these flows are not selected, retarget or close with an owner-approved disposition and verified outcome so the issue cannot indefinitely block launch.

#### Source context

At origin/master commit `ac9c9e499d700a5c81642664a2ab2bf27dab8839`, `page-contact.php:50, 80, 126, 168` defines four forms with no `action` or `method`. Its inline script at `:309–347` only handles tabs/FAQs. Standard browser behavior defaults to GET, which can put names, emails, messages, business/phone details and appointment requests in the URL. Tabs at `:42–45` lack tab/panel/selected semantics; FAQ buttons at `:273–297` lack expanded-state relationships. Contact details/locations/hours/emergency helpline are at `:206–236`; mock maps at `:251, 258` have no accessible iframe titles. The page promises 4K virtual inspection, 24-hour response, and worldwide insured shipping at `:167, 279, 285–287`. CMS assignment, live route, current details and policy truth are unverified; MUK-27/28 own claims/policies.

#### Scope and acceptance criteria

After MUK-25/MUK-29/MUK-28 decisions, implement only approved General, Bespoke, Wholesale and Virtual Inspection modes. Connect each enabled form to the approved WordPress handler; use owner-approved details/maps/hours/response expectations. Treat inspection/scheduling as a request unless an approved scheduler confirms a reservation. Provide accessible validation, submission, failure, retry and success states. Keep PII out of URLs, browser history, referrers and unnecessary logs.

1. Start only after platform, route/purpose/inbound path and allowed contact modes/details are approved.
2. Every enabled form uses an explicit non-GET method and approved server-side handler. Validate request origin/CSRF protection as well as server fields; test direct unauthenticated and malformed endpoint requests. Tests prove fields never appear in URL, history or referrer.
3. Validate/sanitize server-side: required fields, email/phone formats, length limits, invalid values, replay/duplicates and abuse controls. Browser validation alone is insufficient.
4. Apply MUK-12 privacy/consent. Collect only approved fields. Do not enable live storage/email until MUK-14/15 destination, delivery, retention and access controls exist. Isolated disposable synthetic records may exercise local handling.
5. Keep live intake disabled until MUK-12–15 are verified. In fixtures use synthetic values, Mailpit, and blocked outbound production/third-party requests.
6. Local success yields a safe confirmation and only necessary fields to Mailpit; verify request type/reference survives the approved record-to-delivery handoff. Failure is visible and retry cannot duplicate the synthetic record or message.
7. Wholesale inquiry grants no trade access/pricing; use MUK-30 when selected. Inspection request is not a confirmed booking.
8. Publish contact details, locations, hours, maps, links and response targets only when owner-verified. Remove mock maps or replace with approved accessible alternatives; retained iframes have meaningful titles.
9. Tabs/FAQs work by keyboard/assistive technology with selected/expanded relationships, visible focus, 320 CSS-pixel/mobile widths and 200% zoom.
10. Route and entry links work for logged-out fixture visitors. Hand rendered route to MUK-18; do not infer it from the template.
11. MUK-20 remains production go/no-go; issue completion does not enable live intake.

#### Verification, deliverables, and handoff

Use the shared `tests/wordpress/` harness with one bootstrap owner recorded in MUK-25. If absent, block and update the owner; do not bootstrap another environment. Document `composer test:contact-flows`. Test each approved form with synthetic valid, missing, malformed, oversized, duplicate, spam, success and failure cases; assert no PII in URLs/logs; verify Mailpit routing; test logged-out rendering, request-origin/CSRF, selected-platform challenge protection, privacy links, tabs/FAQ keyboard/focus and responsive states. Run `php -l` and `bash validate-repo.sh`; retain sanitized evidence only. Deliver approved field/mode map, safe handlers, approved or withheld details/maps, tests/setup commands, MUK-21 operator handoff and MUK-18 route handoff. No production changes.

#### WordPress-specific challenge and abuse protection (2026-10-29)

MUK-13’s current Turnstile action/environment is Next.js-specific. For WordPress, implement owner-approved server-side challenge verification on each selected endpoint or retarget MUK-13 before live intake. Validate secret server-side, expected hostname/action, bounded timeout, missing/invalid/replayed token, request origin/CSRF, and throttling under the selected host’s trusted-proxy/process topology. Fail closed without exposing secrets or storing PII in URLs/logs. Synthetic local tests prove allowed/rejected outcomes; a Next.js key/config does not protect WordPress.

### [MUK-42: Integrate the approved WordPress FAQ page with accessible interactions](https://linear.app/mukund-ajmera/issue/MUK-42/integrate-the-approved-wordpress-faq-page-with-accessible-interactions)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) if FAQ is retained/published

#### Job story and content gates

When a visitor searches for product or policy guidance, they want categories, search and answers that work with keyboard and assistive technology, so they can find approved information confidently. Do not change WordPress code until MUK-25 selects WordPress and MUK-29 approves page disposition, purpose, route and inbound links. Compare FAQ purpose with existing education and Contact FAQs. MUK-11 owns gemology, MUK-27 claims and MUK-28 policies; these gate publication of affected copy but not content-independent interactions. MUK-18 owns rendered SEO. Use approved copy or synthetic fixtures; do not rewrite pending facts.

#### Source context

At origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`, `page-faq.php:10` calls `get_header()` before enqueueing `faq.css` at `:13`; test rendered placement because WordPress may hoist late styles. “All” at `:54` references `faq-panel-all`, but no such panel exists; only Technology, 4Cs, Buying and Care panels are defined. Tabs have roles, but script at `:280–309` lacks arrow-key/roving-focus behavior. Search at `:312–360` filters items, but no-results at `:239` is not announced. Accordion buttons already use `aria-expanded`, `aria-controls` and hidden panels; preserve that behavior. CMS assignment/live route remain unverified.

#### Acceptance criteria

1. MUK-25/MUK-29 approve platform/page disposition, distinct purpose, route and relationships to Education/Contact before implementation.
2. Approved route renders logged out from approved inbound path using CMS page/menu fixtures; do not infer live route/orphan status from template.
3. Enqueue `faq.css` conditionally via `wp_enqueue_scripts`; document handle/dependency/cache version. Rendered test confirms one link in `<head>` and computed styles apply.
4. Every `aria-controls` points to a real panel. Implement a valid All panel or make All a non-tab filter. Synchronize selection, focus and visible/hidden panel state.
5. Tabs support keyboard/visible focus including arrow keys and Home/End or a documented tested model.
6. Accordion state remains correct by keyboard; hidden content is not focusable or exposed.
7. Search keeps results/categories synchronized and announces result counts/no results without unexpected focus movement.
8. Search/tabs/accordions usable at 320 CSS px and 200% zoom. Check mobile/desktop overflow, focus, contrast and reduced motion.
9. Published answers match recorded MUK-11/27/28-approved content; this issue changes no facts and leaves pending statements unpublished.
10. Hand selected rendered route to MUK-18; no competing schema.

If the FAQ page or WordPress is not retained, retarget or close MUK-42 with an owner-approved disposition and verified outcome. Contact-page FAQ interactions remain with MUK-41; shared helpers may be reused without a completion dependency.

#### Verification and deliverables

Use the shared `tests/wordpress/` harness with one bootstrap owner recorded in MUK-25. If absent, block and update the owner; do not bootstrap another environment. Add a documented suite such as `composer test:faq-page`. With synthetic approved-content fixtures test panel IDs, keyboard/focus, category selection, expansion, matching/zero results, announcements, mobile/zoom, and stylesheet placement/computed styles. Include automated accessibility results and manual keyboard/screen-reader review; run `php -l` and `bash validate-repo.sh`. No production data, credentials, live route or network writes. Deliver accessible interactions, stylesheet enqueue, reproducible tests, sanitized evidence and MUK-18 handoff.

### [MUK-43: Wire and harden the WordPress plugin health dashboard](https://linear.app/mukund-ajmera/issue/MUK-43/wire-and-harden-the-wordpress-plugin-health-dashboard)

**Status:** Backlog · **Priority:** Medium · **Milestone:** Wave 2 — Production Operations & SEO<br>
**Blocked by:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction)<br>
**Blocks:** None<br>
**Related:** [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback)

#### Job story and platform gates

When an operator checks WordPress, they want a reliable, appropriately restricted status report, so they can spot relevant plugin/store configuration issues without false alarms or treating diagnostics as proof that production services work. Do not change code until MUK-25 selects WordPress and the owner approves the required/optional plugin/configuration profile. MUK-30/31 requirements apply only if those journeys are selected. MUK-21 owns the operator runbook. If this diagnostic is not retained, record that disposition and remove/defer the inert module.

#### Source context

At origin/master `ac9c9e499d700a5c81642664a2ab2bf27dab8839`, `inc/plugin-automation.php:12–17, 156–157` defines/instantiates the module. `functions.php:109–119` includes other modules but not this file, and repository search found no other loader; the dashboard is not wired. The module hardcodes WooCommerce/LiteSpeed/Rank Math as essential (`:22–27`), treats 14 WooCommerce tables as required and checks presence only (`:45–67`), and treats option presence/category-base as configuration readiness (`:70–76`). Admin notices check `manage_options` (`:85–112`), but widget registration/render lack equivalent capability protection (`:118–153`). Dynamic text/table identifiers are not escaped (`:101, 107, 111, 138, 147, 150`). The current checks are read-only and do not prove service operation.

#### Scope and acceptance criteria

Wire the module once in intended admin context; use owner-approved required/optional plugins and alternatives; make WooCommerce checks version/schema/order-storage aware; restrict widget/notices to approved capabilities; escape output; bound/cache diagnostics to relevant screens; report only what is observed. The read-only dashboard must not claim checkout, payment, shipping, email, or production readiness.

1. Implement only after MUK-25 and owner profile approval. If not retained, disposition and remove/defer the inert module.
2. Authorized audiences see the widget/notices; direct widget rendering independently checks capability. Unauthorized users get no diagnostics.
3. Missing required plugins give actionable results; optional/alternative plugins do not create false critical alerts; unknown is not healthy.
4. Verify supported WooCommerce version, schema/update and applicable order-storage mode. Do not treat a fixed table list as universal; option presence does not prove payment/checkout configuration.
5. Escape dynamic output and expose no secrets, PII, raw configuration, SQL errors or untrusted markup.
6. Scope/cap database work to relevant screens and bound/cache repeats. Document freshness, invalidation and refresh.
7. Status copy may distinguish plugin active, configuration observed, needs review, unavailable, or unknown. The dashboard itself never reports service verified; MUK-20 separately records production-service evidence with provenance and date. Reading the dashboard performs no plugin/config/schema/business-data mutation.

#### Verification and handoff

Use the shared `tests/wordpress/` harness with one bootstrap owner recorded in MUK-25. If absent, block and update the owner; do not bootstrap another environment. Test required/optional/alternative plugins, WooCommerce absent, supported schemas/updates/order storage, optional table absence, DB errors, authorized/unauthorized users, escaping with synthetic markup-like labels/prefixes, query/cache behavior, and no mutation. Run `php -l` and `bash validate-repo.sh`. Deliver the gated dashboard, version-aware rules, tests and sanitized commands; hand status meanings/limitations/remediation owners to MUK-21. No production changes or secrets.

## Wave 3 — Launch Gate & Run Operations

### [MUK-20: Run the production launch gate on verified data and services](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 3 — Launch Gate & Run Operations<br>
**Blocked by:** [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks), [MUK-40](https://linear.app/mukund-ajmera/issue/MUK-40/integrate-the-approved-technology-guide-with-accessible-responsive), [MUK-41](https://linear.app/mukund-ajmera/issue/MUK-41/deliver-the-approved-wordpress-contact-flows-safely-end-to-end), [MUK-42](https://linear.app/mukund-ajmera/issue/MUK-42/integrate-the-approved-wordpress-faq-page-with-accessible-interactions), [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal), [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges), [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel), [MUK-34](https://linear.app/mukund-ajmera/issue/MUK-34/show-verified-product-evidence-and-truthful-delivery-information), [MUK-33](https://linear.app/mukund-ajmera/issue/MUK-33/stop-inferred-product-attributes-from-generating-factual-copy), [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts), [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), [MUK-18](https://linear.app/mukund-ajmera/issue/MUK-18/close-technical-seo-gaps-on-the-confirmed-production-site), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback), [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-17](https://linear.app/mukund-ajmera/issue/MUK-17/revalidate-the-wordpress-redirect-map-against-current-urls), [MUK-16](https://linear.app/mukund-ajmera/issue/MUK-16/canonicalize-apex-and-www-and-remove-redirect-chains), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-12](https://linear.app/mukund-ajmera/issue/MUK-12/draft-and-publish-a-privacy-notice-for-inquiry-collection), [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection), [MUK-7](https://linear.app/mukund-ajmera/issue/MUK-7/secure-the-wordpress-rollback-path-and-retention-decision), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-5](https://linear.app/mukund-ajmera/issue/MUK-5/verify-the-active-cvd-deployment-domain-mapping-and-preview), [MUK-10](https://linear.app/mukund-ajmera/issue/MUK-10/approve-design-source-product-imagery-and-certificate-evidence), [MUK-8](https://linear.app/mukund-ajmera/issue/MUK-8/replace-fictional-sample-stones-with-owner-approved-inventory), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history)<br>
**Blocks:** [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health)

#### Job story

When the team is deciding whether to launch, it wants evidence from the real production target, so the go/no-go decision reflects actual behavior.

#### Why

The project has historical local and staging Lighthouse evidence, but the active domain is unresolved and production configuration has known gaps. Launch readiness must be checked against the confirmed target after prerequisites close.

#### Acceptance criteria

* Agree and record the browser/viewport matrix before testing; at minimum use the latest Chrome on desktop at 1440×900 and mobile at 390×844.
* Verify home, catalog, representative stone, contact, guide, not-found, and legacy-redirect paths on the confirmed production domain.
* Verify TLS, canonical URLs, indexing/robots, sitemap, and redirect destinations; retain timestamped results.
* Verify all catalog/detail/sitemap counts match approved real inventory and no sample banner or fictional product data remains.
* Submit one controlled internal inquiry and verify storage, both emails, spam checks, and failure visibility; never use a customer recipient.
* Run Lighthouse on representative pages; agree thresholds before the run (baseline proposal: Performance ≥90, Accessibility ≥95, Best Practices ≥95, SEO ≥95 on indexable production pages, CLS ≤0.1). Record any owner-approved exception.
* Confirm there are no critical accessibility failures; publish the evidence and a signed go/no-go with remaining accepted risks.

#### Dependencies

Requires verified source/release identity, domain and rollback state, approved catalog and assets, working inquiry configuration, privacy notice, redirects, and technical SEO. Four-week monitoring starts after this gate and does not block it.

#### Sources

`docs/SEO-CHECKLIST.md` live/local checks; `docs/FORM-HANDLING.md` verification gaps; `docs/PHASE-2-EXECUTION-LOG.md`.

#### Live launch-gate evidence addendum (2026-10-29)

The current public root and catalog show the sample-inventory banner, and the stone inquiry flow displayed a Turnstile testing-only label in a dedicated read-only browser session. Production launch checks must explicitly verify the public build identity, approved non-sample inventory, real bot-protection configuration, policy links, and inquiry delivery against the confirmed target. A visible sample notice is safer than an unmarked fictional offer, but it is not proof of production readiness.

#### Inquiry ownership and cross-layer launch addendum (2026-10-29)

For every enabled live inquiry flow, the owner names a primary lead owner and backup, approves the expected response window, and approves the escalation path for an unassigned or overdue inquiry. Before launch, use a synthetic inquiry in an isolated environment and trace it from submission through secure receipt, assignment, acknowledgment, follow-up decision, and documented disposition. Record timestamps and outcome without real personal data. Production launch remains blocked if no responsible owner, backup, response expectation, or safe handoff exists. Verify the selected end-to-end journey from entry page through catalog/filter, product evidence and availability, inquiry or owner-selected checkout, and confirmation; verify price, currency, availability, and product evidence agree across rendered listing/detail/structured data/sitemap where applicable. Test at least one unavailable-item case.

#### New WordPress page launch scope addendum (2026-10-29)

If WordPress is selected and MUK-29 retains Contact, FAQ, Custom Jewelry or Technology pages, verify only approved routes on the confirmed release. For Contact/custom-design, confirm MUK-12–15 approvals and trace a synthetic isolated submission before accepting live inquiries. Verify approved contact/policy content and route-specific SEO/accessibility handoffs. Source templates, placeholder assets, mock maps or an admin health widget do not prove production readiness.

#### Entry-surface truth and keyboard release evidence (2026-10-29)

The selected-route gate checks the homepage and featured cards as well as catalog/detail pages for sample-state disclosure consistency across visible copy, metadata, social previews and JSON-LD. Verify homepage certificate, gemologist, stock-count, price and response-time claims have MUK-8/MUK-11 evidence or are removed/qualified. Do not clear sample status while synthetic inventory or derivative claims remain.

Include a manual keyboard pass on the inquiry dialog: Tab and Shift+Tab remain inside while open; Escape closes it; focus returns to the opener; visible focus and error/status announcements work. Check catalog filters, sort controls, responsive layout and 200% zoom. Record browser/version, route, viewport, outcome and sanitized evidence reference.

### [MUK-21: Publish an operating runbook for catalog, inquiries, and rollback](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 3 — Launch Gate & Run Operations<br>
**Blocked by:** [MUK-7](https://linear.app/mukund-ajmera/issue/MUK-7/secure-the-wordpress-rollback-path-and-retention-decision), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-14](https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end), [MUK-15](https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls)<br>
**Blocks:** [MUK-23](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

#### Job story

When an operator updates inventory or handles an incident, they want a concise runbook, so routine work and recovery do not depend on memory.

#### Why

Inventory is build-time data, inquiry records need monitoring, email can fail, and the hosting/domain/WordPress rollback path is disputed. Operations currently depend on one-off knowledge in the phase logs.

#### Acceptance criteria

* Document the approved CSV editing/validation/rebuild/deploy workflow and how to roll back a bad inventory release.
* Document who checks inquiry storage and delivery outcomes, response expectations, data access, backup/restore, retention, and escalation.
* Document hosting release identity checks, environment-variable ownership/rotation, domain/DNS escalation boundaries, and the WordPress rollback path.
* Confirm the runbook contains no credentials or personal lead data and is accessible to the intended operators.
* Name the operator and backup operator for catalog releases, lead checks, and rollback actions.
* Record the release evidence and escalation contacts without storing credentials, tokens, or lead contents.

#### Dependencies

[MUK-6](<https://linear.app/mukund-ajmera/issue/MUK-6/identify-the-authoritative-app-checkout-and-restore-source-history>), [MUK-7](<https://linear.app/mukund-ajmera/issue/MUK-7/secure-the-wordpress-rollback-path-and-retention-decision>), [MUK-9](<https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check>), [MUK-14](<https://linear.app/mukund-ajmera/issue/MUK-14/configure-inquiry-email-and-verify-internal-delivery-end-to-end>), [MUK-15](<https://linear.app/mukund-ajmera/issue/MUK-15/set-lead-data-durability-access-retention-and-recovery-controls>).

#### Sources

`README.md`; `DECISIONS.md` D-03/D-06/D-08/D-11; `docs/FORM-HANDLING.md`; Phase 2 docs.

#### Inquiry ownership and resolution runbook addendum (2026-10-29)

The runbook names a primary inquiry owner and backup, records the owner-approved response target and overdue escalation, and gives the operator exact steps to assign, acknowledge, follow up, and disposition an inquiry. If the owner has not approved a response target, label it pending and keep live inquiry launch gated; do not invent a customer promise. Include the authorized system-of-record, access role, and escalation contact without embedding credentials or personal customer records. Verify the procedure with a synthetic inquiry traced from receipt to a final outcome in an isolated environment; record a redacted evidence reference and timestamps. Document how operators handle duplicate, spam, incomplete, out-of-stock, and no-response inquiries.

#### WordPress contact-flow operations addendum (2026-10-29)

If Contact/design requests are retained, document each enabled channel, primary/backup owner, approved response target, escalation, failure/retry, retention/deletion, and supported-market policy. Cover General, Bespoke, Wholesale, Virtual Inspection and custom-design handoff from secure storage/assignment to disposition. Contact addresses, hours and response promises remain unverified until MUK-28 approval. If MUK-43 is retained, document its status meanings, limitations and remediation owner; do not use it as production service proof.

#### Business-day operations for selected trade and D2C flows (2026-10-29)

While file-backed inquiry intake is enabled, define a check on each business day, with named primary and backup operators, queue/outbox/delivery-failure review, response-target tracking, unassigned/overdue escalation, and safe retry/idempotency steps. Weekly MUK-23 trend review does not replace timely operational checks. If MUK-30 trade is selected, cover application review, suspension/role changes, quote expiry and buyer-upload CSV exceptions. If MUK-31 checkout is selected, cover order/fulfillment status, refunds/returns, payment-webhook failure/replay/reconciliation and customer-support handoff. Specify the authorized system of record, alert route, evidence, and owner-approved response/retention policies; do not promise an unstaffed response window.

### [MUK-23: Monitor the first four weeks of production SEO and inquiry health](https://linear.app/mukund-ajmera/issue/MUK-23/monitor-the-first-four-weeks-of-production-seo-and-inquiry-health)

**Status:** Backlog · **Priority:** High · **Milestone:** Wave 3 — Launch Gate & Run Operations<br>
**Blocked by:** [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services), [MUK-21](https://linear.app/mukund-ajmera/issue/MUK-21/publish-an-operating-runbook-for-catalog-inquiries-and-rollback)<br>
**Blocks:** None

#### Job story

When production begins, the team wants four weeks of structured monitoring, so search and inquiry issues are found early.

#### Why

The phase plan calls for four weeks of crawl monitoring, and the site has no verified analytics/search baseline. Inquiry delivery and lead-data operations also need an accountable owner.

#### Acceptance criteria

* For four weeks after the launch gate, review Search Console/Bing coverage, crawl errors, impressions/clicks, top old URLs, redirects, and uptime/TLS at weekly checkpoints.
* Review inquiry persistence and email-delivery outcomes without exposing personal data in reports; escalate failures using the operating runbook.
* Record findings, fixes, and decisions at each checkpoint and close with a dated review.
* If search query data has not populated yet, record the provider's data-lag limitation and continue monitoring technical indexing and crawl errors.
* Escalate any outage, broken inquiry delivery, exposure of lead data, or critical indexing issue promptly.
* Keep the monitoring report free of credentials and personal lead details.

#### Dependencies

Starts only after the production launch gate and the operating runbook are complete, with Search Console/Bing properties configured.

#### Sources

`docs/PHASE-2-DOMAIN-TRANSFER.md` monitoring plan; `docs/PHASE-2-EXECUTION-LOG.md` open items; `docs/FORM-HANDLING.md`.

### [MUK-24: Validate SEO keyword demand and prioritize the next content wave](https://linear.app/mukund-ajmera/issue/MUK-24/validate-seo-keyword-demand-and-prioritize-the-next-content-wave)

**Status:** Backlog · **Priority:** Medium · **Milestone:** Wave 3 — Launch Gate & Run Operations<br>
**Blocked by:** [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement), [MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides)<br>
**Blocks:** None

#### Job story

When search and query data becomes available, the team wants validated content priorities, so the next publishing effort follows demand and evidence.

#### Why

Keyword research was not performed. The SEO checklist lists candidate topics including price per carat, IGI vs GIA, CVD vs HPHT, and choosing a shape.

#### Acceptance criteria

* Review search-property query data and authorized keyword research for the candidate topics.
* Produce a prioritized content brief with search intent, target page, evidence needed, and gemologist review requirements.
* Do not add unsupported price claims or publish unreviewed gemology facts.
* Record topics deferred and why, so the next content wave follows observed demand rather than assumptions.


* Record the research sources, collection date, and limitations for each candidate keyword cluster.
* Provide a prioritized brief with intent, target page, evidence needed, review owner, and a measurable success signal.

#### Dated competitor and information-architecture research (2026-10-29)

Add a bounded, dated comparison of at least four relevant competitors in the owner-selected market. Capture source URLs/date, buyer segment, entry/category paths, product evidence/media, filters/comparison, human assistance, policy transparency, content discovery/internal links, and any publicly documented machine-readable inventory surface. Label vendor statements as vendor claims; do not treat competitor features, facts, policies, apparent availability, or apparent demand as evidence for this business.

Deliver a page/topic/internal-link opportunity map tied to validated Search Console/Bing queries and keyword intent, existing page purpose (MUK-29), evidence/reviewer requirements (MUK-11/MUK-27), and a measurable success signal (MUK-19). Recommend only owner-feasible experiments. Do not create a public inventory/API obligation unless MUK-6/MUK-8 establish an authorized source and the owner selects it.

#### Dependencies

[MUK-11](https://linear.app/mukund-ajmera/issue/MUK-11/have-a-gemologist-review-product-claims-and-learning-guides) expert review process; [MUK-19](https://linear.app/mukund-ajmera/issue/MUK-19/connect-search-properties-and-establish-acquisition-measurement) verified Search Console/Bing access.

#### Sources

`docs/SEO-CHECKLIST.md` content targeting TODO; `docs/REFERENCE-SITES.md`.

### [MUK-39: Add regression, accessibility, responsive, and end-to-end release checks](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks)

**Status:** Backlog · **Priority:** Urgent · **Milestone:** Wave 3 — Launch Gate & Run Operations<br>
**Blocked by:** [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates), [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal), [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check), [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history), [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges), [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel)<br>
**Blocks:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services)

**Priority / wave:** Urgent / Wave 3 — Launch Gate & Run Operations.

**Job story:** When an app change is proposed for launch, the owner wants repeatable checks across critical flows and release conditions, so known form, catalog, accessibility, SEO, and data failures cannot ship silently.

**Dependencies:** Implement after [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel) through [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates) complete their targeted verification. [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects the platform. If Next.js is retained, [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes its authoritative source, branch, app root, access, runtime, manifest, and lockfile before tooling is chosen. Consume [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s product model, [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix)’s page inventory, and [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order)’s approved sales/checkout decision. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) is Wave 3 and blocks [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services). [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) consumes its evidence and verifies deployed behavior. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) also consolidates [MUK-9](https://linear.app/mukund-ajmera/issue/MUK-9/add-a-repeatable-inventory-validation-and-release-check)’s inventory validation.

**Evidence:** The local Next app’s package manifest defines dev/build/start/lint/build:host scripts and has no test script. Inspect the selected repository’s actual manifest and lockfile only after [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) confirms the source. The local forms, filters, modal, redirects, sitemap, and launch conditions have no checked-in regression suite.

**Scope:** After [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) confirms the selected manifest and lockfile, add compatible, pinned unit/component, accessibility, and E2E tooling. Pin browser installation/version and record it. Keep synthetic test fixtures separate from release-preflight configuration. Add a side-effect-free release check for artifact/config invariants. Reject sample data only when sample records or sample flags are included in the release artifact. Consume verified [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection)/14/15 evidence for real protection, delivery, and storage; configuration presence cannot prove those services work. [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) verifies deployed services and owns human go/no-go.

**Out of scope:** Production DNS/deployment, real lead submissions or external recipients, access to secrets, full WCAG certification, unsupported-browser guarantees, synthetic external-provider uptime, or changing business policies without owner approval.

**Owner inputs:** [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) owns production thresholds and the reproducible Lighthouse procedure. Reuse its existing criteria rather than defining new ones. Confirm target viewport/browser policy. Tests use mocked or local destinations only; no external recipients.

**Acceptance criteria:**

 1. Document clean-install commands for lint, production build, unit, accessibility, E2E, release check, and CI/Jules. Each returns nonzero on failure. Use the selected repository’s scripts, not assumed local script names.
 2. Unit/component coverage includes inventory validation, [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel) channel rules, [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges) numeric ranges under [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) field/unit/currency/precision rules, [MUK-37](https://linear.app/mukund-ajmera/issue/MUK-37/keep-keyboard-and-assistive-technology-focus-inside-the-inquiry-modal) focus behavior, [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates) sitemap provenance/routes, and [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) page/redirect inventory. Use the selected [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) product record shape, including variants/components when applicable.
 3. One complete synthetic E2E journey covers entry → catalog/filter → product evidence/status → approved inquiry or checkout → confirmation. Assert price, currency, availability, and evidence/report identity agree across listing, detail, and applicable structured data. In the sitemap, assert the canonical product URL is included or excluded under [MUK-22](https://linear.app/mukund-ajmera/issue/MUK-22/define-sold-stone-removal-and-inventory-freshness-behavior) and that modification provenance is correct. Cover unavailable/sold/removed behavior. [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) defines whether records represent loose stones or jewelry SKUs/variants/components, pricing, and custom-order timing.
 4. For each owner-selected flow in [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction), [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote), or [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order), test only approved capabilities. Checkout, payment, cancellation/refund, fulfillment, and customer-update tests apply only where checkout is selected; stock hold/expiry tests apply only where holds are approved. Inquiry-only flows expose no payment or implied reservation. Include trade authorization and price visibility when [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) is selected. [MUK-30](https://linear.app/mukund-ajmera/issue/MUK-30/establish-the-approved-trade-buyer-journey-from-application-to-quote) and [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) specify the respective branches; [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) must not invent them.
 5. E2E also covers general contact, validation failure/retry, mocked success, modal open/close, no-results/reset, legacy redirects, and not-found. All tests use synthetic data and local mocks. No network email, payment, production leads, or external writes.
 6. Check 1440×900 desktop and 390×844 mobile layouts for overflow, clipped actions, unusable controls, and layout-shift regressions on entry/catalog/product/contact/learn/modal pages.
7. Axe or equivalent reports zero critical/serious violations on the route set and modal. Record a manual keyboard/accessibility-tree check.
7a. Manually verify the dialog traps Tab and Shift+Tab while open, closes on Escape, restores focus to the exact opener and keeps focus visible. Verify keyboard use of filters, sort, clear/reset and channel controls at 320 CSS-pixel width and 200% zoom; check open/close/error/success announcements with a screen reader or accessibility tree. Retain browser/version/route/viewport evidence; automated scans do not replace these interaction checks.
 8. Release preflight validates the release artifact/config only and never claims service readiness from environment-variable presence. Fail closed when the release artifact contains sample records/flags; the production canonical host is localhost, unapproved, or non-HTTPS; production noindex is unexpectedly enabled; public intake is enabled with missing Turnstile protection or test keys; required mail/storage configuration is absent for the selected flow; or applicable privacy/policy approval evidence is missing. Test each deterministic condition independently using non-secret fixtures and never print secret values. Consume verified [MUK-13](https://linear.app/mukund-ajmera/issue/MUK-13/replace-cloudflare-turnstile-test-keys-with-production-protection)/14/15 evidence; [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) verifies deployed Turnstile, mail, and storage operation. Approval markers or configuration presence cannot prove those services work.
 9. Provide a reproducible Lighthouse command and test conditions for [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) thresholds: build, browser/version, host/CPU/network/throttling conditions, and retained raw reports. [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) remains the source of thresholds and executes the production gate.
10. Release preflight never deploys, changes DNS, sends messages, or writes production data. Store sanitized artifacts without credentials or PII.

**Fixtures/tests:** Synthetic catalog matching [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification)’s selected model, including available/on-hold/memo/sold/unavailable and malformed records; deterministic local Turnstile/mail/storage/payment/fulfillment mocks; fixed source dates; [MUK-29](https://linear.app/mukund-ajmera/issue/MUK-29/approve-the-audience-led-navigation-tree-and-page-purpose-matrix) route fixture; pinned browser/version and desktop/mobile viewports. Test preflight with and without sample records in the built artifact. Never use customer email, live payment, production storage, PII, or network writes.

**Deliverables:** Selected-repository-compatible test tooling, pinned lockfile/browser, unit/component/E2E/accessibility tests, artifact-aware release preflight, CI/Jules command documentation, sanitized reports, and an evidence handoff checklist for [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services).

**Done when:** [MUK-25](https://linear.app/mukund-ajmera/issue/MUK-25/approve-the-primary-customer-journey-and-product-direction) selects and [MUK-6](https://linear.app/mukund-ajmera/issue/MUK-6/establish-the-authoritative-cvd-app-repository-and-source-history) establishes the retained Next.js source; [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel) through [MUK-38](https://linear.app/mukund-ajmera/issue/MUK-38/publish-a-route-accurate-sitemap-with-trustworthy-modification-dates) pass their independent targeted verification; all [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) commands pass on the approved branch; fail-closed cases are proven to return nonzero. [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) is downstream of [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel)..38 and blocks [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services). No issue in [MUK-35](https://linear.app/mukund-ajmera/issue/MUK-35/require-a-matching-contact-detail-for-the-selected-inquiry-channel)..38 depends on [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) or [MUK-20](https://linear.app/mukund-ajmera/issue/MUK-20/run-the-production-launch-gate-on-verified-data-and-services) to complete.

**Cross-issue alignment:** [MUK-26](https://linear.app/mukund-ajmera/issue/MUK-26/approve-the-inventory-data-contract-and-reconciliation-specification) specifies the selected product model: loose stones versus jewelry, SKU, variants, components, pricing/currency, availability, and custom-order timing. [MUK-31](https://linear.app/mukund-ajmera/issue/MUK-31/deliver-the-owner-selected-direct-to-consumer-discovery-to-order) specifies the chosen sales flow and, when D2C is selected, its checkout and exception paths. [MUK-32](https://linear.app/mukund-ajmera/issue/MUK-32/align-homepage-and-woocommerce-diamond-filter-contracts) is the WordPress alternative to [MUK-36](https://linear.app/mukund-ajmera/issue/MUK-36/validate-numeric-catalog-filters-and-explain-invalid-ranges). [MUK-39](https://linear.app/mukund-ajmera/issue/MUK-39/add-regression-accessibility-responsive-and-end-to-end-release-checks) consumes these approved contracts and tests the selected flow; it does not create checkout assumptions.

## References and source limits

- Public site observations: [home](https://labgrowndiamondcvd.com/), [catalog](https://labgrowndiamondcvd.com/diamonds), [sample stone detail](https://labgrowndiamondcvd.com/diamonds/lgd-01007), [contact](https://labgrowndiamondcvd.com/contact), [learn](https://labgrowndiamondcvd.com/learn), and [about](https://labgrowndiamondcvd.com/about), visited 2026-10-29.
- Competitor examples are listed above. Relevant primary policy guidance referenced by MUK-27 includes the [FTC Jewelry Guides](https://www.ftc.gov/news-events/topics/tools-consumers/jewelry-guides) and [FTC environmental-claims guidance](https://www.ftc.gov/business-guidance/resources/environmental-claims-summary-green-guides); use the assigned market reviewer and current guidance before approving claims.
- WordPress source references in MUK-30–34 were first recorded at origin/master commit b993fc92544dd82970978d674b7364cf3ba66a52; the referenced files were unchanged through origin/master ac9c9e499d700a5c81642664a2ab2bf27dab8839. Technology-page evidence in MUK-11/18/27/29/40 is tied to 7596d48c. Contact, FAQ, Custom Jewelry and plugin-health source evidence in MUK-10/11/12–15/18/20/21/26–31/41–43 is tied to ac9c9e49. All WordPress findings remain source-only until MUK-25 selects that platform and applicable routes are verified. If a different branch/platform is selected, refresh every source reference before execution.

---

**Synchronization note:** This file includes the full Linear issue descriptions and blocker relations reconciled on 2026-10-29. Update the corresponding Linear issue first, then reconcile this file. Do not treat this snapshot as current if Linear changes.
