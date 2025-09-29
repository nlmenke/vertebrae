# Pull Requests

When creating a pull request, please make sure to follow the practices outlined
in this documentation. Otherwise, it will be closed without further review.
Please only create pull requests on GitHub as the GitLab repository is only
being used to test CI/CD pipelines and will not be monitored.

A new pull request should use one of the templates provided.
- [bugfix](/.github/pull_request_template/bugfix-template.md)
- [documentation](/.github/pull_request_template/documentation-template.md)
- [feature](/.github/pull_request_template/feature-template.md)

Each of these templates contains a section to allow for you to describe what
the changes do and a checklist of items that should be completed before
requesting a code/documentation review.

## Checklist

Please ensure the checklist is completed before requesting review. Any PR that
is not complete will be ignored (or closed if open with the "ready for review"
label long enough).

As of right now, the checklist for both bugfixes and features are the same:
- pull request title and description are up to date, accurate, and descriptive
- pull request is targeting the appropriate branch
    - ensure the source and target branches are correct; most branches should
      target the `develop` branch
- tests created/updated
    - any new code should have a unit test dedicated to each new class required
      for the feature; bugfixes may require changes to existing tests
    - this can be checked (with a note) if not applicable
- conforms to the project's [coding styles](coding_style.md)
    - check the linked doc for formatting; all code should follow our standards
- documentation created/updated
    - any new code should include documentation for the added changes; if there
      is a time-constraint, you may create an issue to create the new docs
    - this can be checked (with a note) if not applicable or an issue was created
      (link the documentation issue)
- test pipeline is green
    - this is not listed as a checklist item, but the testing pipeline **must**
      succeed before the PR is listed as ready for a code review

Documentation pull requests have a slightly different checklist; it excludes
some items, however, there are a few added:
- pull request only includes documentation changes
    - **no code changes** should be included in documentation PRs
- documentation is clear, accurate, and descriptive
    - this should be true of any documentation change; however, since this PR
      only contains updates to the docs, we want to be extra sure
