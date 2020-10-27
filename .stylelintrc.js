/**
 * Config file for stylelint.
 *
 * @package Config - stylelint
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

/**
 * @type {object}
 */
let stylelintPossibleErrors = {
    /**
     * Disallow unknown at-rules.
     *
     * @property {object} options
     *                    - `ignoreAtRules` {regex[]|string[]} At rules to be ignored
     */
    'at-rule-no-unknown': [
        true,
        {
            'ignoreAtRules': [
                'each',
                'function',
                'if',
                'mixin',
                'include',
                'return',
            ],
        },
    ],

    /**
     * Disallow empty blocks.
     *
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `comments` Excludes comments from being treated inside of a block
     */
    'block-no-empty': [
        true,
        {
            'ignore': [],
        },
    ],

    /**
     * Disallow invalid hex colors.
     */
    'color-no-invalid-hex': true,

    /**
     * Disallow empty comments.
     */
    'comment-no-empty': true,

    /**
     * Disallow duplicate properties within declaration blocks.
     *
     * @property {object} options
     *                    - `ignore`           {string[]}         Properties to ignore
     *                                                            - `consecutive-duplicates`
     *                                                              Ignore consecutive duplicated properties
     *                                                            - `consecutive-duplicates-with-different-values`
     *                                                              Ignore consecutive duplicated properties with
     *                                                              different values
     *                    - `ignoreProperties` {regex[]|string[]} Ignore duplicates of specific properties
     */
    'declaration-block-no-duplicate-properties': [
        true,
        {
            'ignore': [],
            'ignoreProperties': [],
        },
    ],

    /**
     * Disallow shorthand properties that override related longhand properties.
     */
    'declaration-block-no-shorthand-property-overrides': true,

    /**
     * Disallow duplicate font family names.
     *
     * @property {object} options
     *                    - `ignoreFontFamilyNames` {regex[]|string[]} Font family names to be ignored
     */
    'font-family-no-duplicate-names': [
        true,
        {
            'ignoreFontFamilyNames': [],
        },
    ],

    /**
     * Disallow missing generic families in lists of font family names.
     *
     * @property {object} options
     *                    - `ignoreFontFamilies` {regex[]|string[]} Font families to be ignored
     */
    'font-family-no-missing-generic-family-keyword': [
        true,
        {
            'ignoreFontFamilies': [],
        },
    ],

    /**
     * Disallow an invalid expression within `calc` functions.
     */
    'function-calc-no-invalid': true,

    /**
     * Disallow an unspaced operator within `calc` functions.
     */
    'function-calc-no-unspaced-operator': true,

    /**
     * Disallow direction values in `linear-gradient()` calls that are not valid according to the standard syntax.
     */
    'function-linear-gradient-no-nonstandard-direction': true,

    /**
     * Disallow `!important` within keyframe declarations.
     */
    'keyframe-declaration-no-important': true,

    /**
     * Disallow unknown media feature names.
     *
     * @property {object} options
     *                    - `ignoreMediaFeatureNames` {regex[]|string[]} Media feature names to be ignored
     */
    'media-feature-name-no-unknown': [
        true,
        {
            'ignoreMediaFeatureNames': [],
        },
    ],

    /**
     * Disallow selectors of lower specificity from coming after overriding selectors of higher specificity.
     *
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `selectors-within-list` Ignores selectors within list of selectors
     */
    'no-descending-specificity': [
        true,
        {
            'ignore': [],
        },
    ],

    /**
     * Disallow duplicate `@import` rules within a stylesheet.
     */
    'no-duplicate-at-import-rules': true,

    /**
     * Disallow duplicate selectors within a stylesheet.
     *
     * @property {object} options
     *                    - `disallowInList` {bool} This option will also disallow duplicate selectors within selector
     *                                              lists
     */
    'no-duplicate-selectors': [
        null,
        {
            'disallowInList': false,
        },
    ],

    /**
     * Disallow empty sources.
     */
    'no-empty-source': true,

    /**
     * Disallow extra semicolons.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     */
    'no-extra-semicolons': true,

    /**
     * Disallow double-slash comments (`//...`) which are not supported by CSS.
     */
    'no-invalid-double-slash-comments': true,

    /**
     * Disallow unknown properties.
     *
     * @property {object} options
     *                    - `ignoreProperties` {regex[]|string[]} Properties to be ignored
     *                    - `ignoreSelectors`  {regex[]|string[]} Selectors to be ignored
     *                    - `checkPrefixed`    {bool}             Whether to check vendor-prefixed properties;
     *                                                            default: false
     */
    'property-no-unknown': [
        true,
        {
            'ignoreProperties': [],
            'ignoreSelectors': [],
            'checkPrefixed': false,
        },
    ],

    /**
     * Disallow unknown pseudo-class selectors.
     *
     * @property {object} options
     *                    - `ignorePseudoClasses` {regex[]|string[]} Pseudo classes to be ignored
     */
    'selector-pseudo-class-no-unknown': [
        true,
        {
            'ignorePseudoClasses': [],
        },
    ],

    /**
     * Disallow unknown pseudo-element selectors.
     *
     * @property {object} options
     *                    - `ignorePseudoElements` {regex[]|string[]} Pseudo class elements to be ignored
     */
    'selector-pseudo-element-no-unknown': [
        true,
        {
            'ignorePseudoElements': [],
        },
    ],

    /**
     * Disallow unknown type selectors.
     *
     * @property {object} options
     *                    - `ignore`           {string[]}
     *                                                            - `custom-elements`   Allow custom elements
     *                                                            - `default-namespace` Allow unknown type selectors if
     *                                                                                  they belong to the default
     *                                                                                  namespace
     *                    - `ignoreNamespaces` {regex[]|string[]} Namespaces to be ignored
     *                    - `ignoreTypes`      {regex[]|string[]} Types to be ignored
     */
    'selector-type-no-unknown': [
        true,
        {
            'ignore': [],
            'ignoreNamespaces': [],
            'ignoreTypes': [],
        },
    ],

    /**
     * Disallow (unescaped) newlines in strings.
     */
    'string-no-newline': true,

    /**
     * Disallow unknown units.
     *
     * @property {object} options
     *                    - `ignoreUnits`     {regex[]|string[]} Units to be ignored
     *                    - `ignoreFunctions` {regex[]|string[]} Function names to be ignored
     */
    'unit-no-unknown': [
        true,
        {
            'ignoreUnits': [],
            'ignoreFunctions': [],
        },
    ],
};

/**
 * @type {object}
 */
let stylelintLimitLanguageFeatures = {
    /**
     * Specify percentage or number notation for alpha-values.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     *
     * @property {string}
     *                    - `number`     Alpha-values must always use the number notation
     *                    - `percentage` Alpha-values must always use percentage notation
     * @property {object} options
     *                    - `exceptProperties` {regex[]|string[]} Reverse the primary option for matching properties
     */
    'alpha-value-notation': [
        'number',
        {
            'exceptProperties': [],
        },
    ],

    /**
     * Specify a list of allowed at-rules.
     *
     * @property {string|string[]} Allowed un-prefixed at-rules
     */
    'at-rule-allowed-list': null,

    /**
     * Specify a list of disallowed at-rules.
     *
     * @property {string|string[]} Disallowed un-prefixed at-rules
     */
    'at-rule-disallowed-list': [
        'debug',
    ],

    /**
     * Disallow vendor prefixes for at-rules.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     */
    'at-rule-no-vendor-prefix': true,

    /**
     * Specify a list of required properties for an at-rule.
     *
     * @property {object}
     *                    - (at-rule-name) {string[]} Property list
     */
    'at-rule-property-required-list': null,

    /**
     * Specify modern or legacy notation for applicable color-functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     *
     * @property {string}
     *                    - `modern` Applicable color-functions must always use modern notation
     *                    - `legacy` Applicable color-functions must always use the legacy notation
     */
    'color-function-notation': null,

    /**
     * Require (where possible) or disallow named colors.
     *
     * @property {string}
     *                    - `always-where-possible` Colors must always, where possible, be named
     *                    - `never`                 Colors must never be named
     * @property {object} options
     *                    - `ignore`          {string[]}
     *                                                           - `inside-string` Ignore colors that are inside a
     *                                                                             function
     *                    - `ignoreProperties {regex[]|string[]} Properties to be ignored
     */
    'color-named': [
        'never',
        {
            'ignore': [],
            'ignoreProperties': [],
        },
    ],

    /**
     * Disallow hex colors.
     */
    'color-no-hex': null,

    /**
     * Specify a list of disallowed words within comments.
     *
     * @property {regex[]|string[]} Disallowed words or patterns
     */
    'comment-word-disallowed-list': null,

    /**
     * Specify a pattern for custom media query names.
     *
     * @property {regex|string} Pattern for allowed media query names
     */
    'custom-media-pattern': null,

    /**
     * Specify a pattern for custom properties.
     *
     * @property {regex|string} Pattern which custom properties must follow
     */
    'custom-property-pattern': null,

    /**
     * Disallow longhand properties that can be combined into one shorthand property.
     *
     * @property {object} options
     *                    - `ignoreShorthands` {regex[]|string[]} Shorthand properties to be ignored
     */
    'declaration-block-no-redundant-longhand-properties': null,

    /**
     * Disallow `!important` within declarations.
     */
    'declaration-no-important': null,

    /**
     * Specify a list of allowed property and unit pairs within declarations.
     *
     * @property {object} options
     *                    - (property-name) {string[]} Allowed units
     */
    'declaration-property-unit-allowed-list': null,

    /**
     * Specify a list of disallowed property and unit pairs within declarations.
     *
     * @property {object} options
     *                    - (property-name) {string[]} Disallowed units
     */
    'declaration-property-unit-disallowed-list': null,

    /**
     * Specify a list of allowed property and value pairs within declarations.
     *
     * @property {object} options
     *                    - (property-name) {string[]} Allowed property values
     */
    'declaration-property-value-allowed-list': null,

    /**
     * Specify a list of disallowed property and value pairs within declarations.
     *
     * @property {object} options
     *                    - (property-name) {string[]} Disallowed property values
     */
    'declaration-property-value-disallowed-list': {
        'border': [
            'none',
        ],
        'border-top': [
            'none',
        ],
        'border-right': [
            'none',
        ],
        'border-bottom': [
            'none',
        ],
        'border-left': [
            'none',
        ],
    },

    /**
     * Limit the number of declarations within a single-line declaration block.
     *
     * @property {int} Maximum number of declarations allowed
     */
    'declaration-block-single-line-max-declarations': 0, // disallowing single-line

    /**
     * Require numeric or named (where possible) `font-weight` values. Also, when named values are expected, require
     * only valid names.
     *
     * @property {string}
     *                    - `numeric`              `font-weight` values must always be numbers
     *                    - `named-where-possible` `font-weight` values must always be keywords when an appropriate
     *                                             keyword is available
     * @property {object}
     *                    - `ignore` {array}
     *                                       - `relative` Ignore the relative keyword names of `bolder` and `lighter`
     */
    'font-weight-notation': null, // should be numeric, but functions cannot be ignored

    /**
     * Specify a list of allowed functions.
     *
     * @property {regex|regex[]|string|string[]} List of allowed functions
     */
    'function-allowed-list': null,

    /**
     * Specify a list of disallowed functions.
     *
     * @property {regex|regex[]|string|string[]} List of disallowed functions
     */
    'function-disallowed-list': null,

    /**
     * Disallow scheme-relative urls.
     */
    'function-url-no-scheme-relative': null,

    /**
     * Specify a list of allowed URL schemes.
     *
     * @property {regex|regex[]|string|string[]} URL schemes to be allowed
     */
    'function-url-scheme-allowed-list': null,

    /**
     * Specify a list of disallowed URL schemes.
     *
     * @property {regex|regex[]|string|string[]} URL schemes to be disallowed
     */
    'function-url-scheme-disallowed-list': null,

    /**
     * Specify number or angle notation for degree hues.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     *
     * @property {string}
     *                    - `angle`  Degree hues must always use angle notation
     *                    - `number` Degree hues must always use the number notation
     */
    'hue-degree-notation': null,

    /**
     * Specify a pattern for keyframe names.
     *
     * @property {regex|string} RegExp/string keyframe names must follow
     */
    'keyframes-name-pattern': null,

    /**
     * Disallow units for zero lengths.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     *
     * @property {object} options
     *                    - `ignore` {string[]} Ignore units for zero length in custom properties
     */
    'length-zero-no-unit': [
        true,
        {
            'ignore': [],
        },
    ],

    /**
     * Limit the depth of nesting.
     *
     * @property {int}    Maximum nesting depth allowed
     * @property {object} options
     *                            - `ignore` {array}
     *                                               - `blockless-at-rules`                    Ignore at-rules that
     *                                                                                         only wrap other rules,
     *                                                                                         and do not themselves
     *                                                                                         have declaration blocks
     *                                               - `pseudo-classes`                        Ignore rules where the
     *                                                                                         first selector in each
     *                                                                                         selector list item is a
     *                                                                                         pseudo-class
     *                                               - `ignoreAtRules`      {regex[]|string[]} Ignore the specified at-
     *                                                                                         rules
     */
    'max-nesting-depth': [
        5,
        {
            'ignoreAtRules': [
                'each',
                'media',
                'supports',
                'include',
            ],
        },
    ],

    /**
     * Specify a list of allowed media feature names.
     *
     * @property {regex[]|string[]} Allowed media feature names
     */
    'media-feature-name-allowed-list': null,

    /**
     * Specify a list of disallowed media feature names.
     *
     * @property {regex[]|string[]} Disallowed media feature names
     */
    'media-feature-name-disallowed-list': null,

    /**
     * Disallow vendor prefixes for media feature names.
     */
    'media-feature-name-no-vendor-prefix': true,

    /**
     * Specify a list of allowed media feature name and value pairs.
     *
     * @property {object} options
     *                    - (media-feature-name) {regex[]|string[]} List of values
     */
    'media-feature-name-value-allowed-list': null,

    /**
     * Disallow unknown animations.
     */
    'no-unknown-animations': null,

    /**
     * Limit the number of decimal places allowed in numbers.
     *
     * @property {int}    Maximum number of decimal places allowed
     * @property {object} options
     *                    - `ignoreUnits` {regex[]|string[]} Ignore the precision of numbers for values with the
     *                                                       specified units
     */
    'number-max-precision': null,

    /**
     * Specify a list of allowed properties.
     *
     * @property {regex|regex[]|string|string[]} Allowed properties
     */
    'property-allowed-list': null,

    /**
     * Specify a list of disallowed properties.
     *
     * @property {regex|regex[]|string|string[]} Disallowed properties
     */
    'property-disallowed-list': null,

    /**
     * Disallow vendor prefixes for properties.
     *
     * @property {object} options
     *                    - `ignoreProperties` {regex[]|string[]} Properties to be ignored
     */
    'property-no-vendor-prefix': [
        true,
        {
            'ignoreProperties': [],
        },
    ],

    /**
     * Disallow redundant values in shorthand properties.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     */
    'shorthand-property-no-redundant-values': true,

    /**
     * Specify the minimum number of milliseconds for time values.
     *
     * @property {int} Minimum number of milliseconds for time values
     */
    'time-min-milliseconds': null,

    /**
     * Specify a list of allowed units.
     *
     * @property {string|string[]} List of allowed units
     * @property {object}          options
     *                             - `ignoreProperties` {object}
     *                                                           - `unit` {regex[]|string[]} Ignore units in the values
     *                                                                                       of declarations with the
     *                                                                                       specified properties
     */
    'unit-allowed-list': null,

    /**
     * Specify a list of disallowed units.
     *
     * @property {string|string[]} List of disallowed units
     * @property {object}          options
     *                             - `ignoreProperties`        {object}
     *                                                                  - `unit` {regex[]|string[]} Ignore units in the
     *                                                                                              values of
     *                                                                                              declarations with
     *                                                                                              the specified
     *                                                                                              properties
     *                             - `ignoreMediaFeatureNames` {object}
     *                                                                  - `unit` {regex[]|string[]} Ignore units for
     *                                                                                              specific feature
     *                                                                                              names
     */
    'unit-disallowed-list': [
        null,
        {
            'ignoreProperties': {
                'unit': [],
            },
            'ignoreMediaFeatureNames': {
                'unit': [],
            },
        },
    ],

    /**
     * Disallow vendor prefixes for values.
     *
     * @property {object} options
     *                    - `ignoreValues` {string[]} Vendor-prefixed values to be ignored
     */
    'value-no-vendor-prefix': [
        true,
        {
            'ignoreValues': [],
        },
    ],

    /**
     * Specify a list of allowed attribute operators.
     *
     * @property {array|string} Allowed operators
     */
    'selector-attribute-operator-allowed-list': null,

    /**
     * Specify a list of disallowed attribute operators.
     *
     * @property {string|string[]} Disallowed operators
     */
    'selector-attribute-operator-disallowed-list': null,

    /**
     * Specify a pattern for class selectors.
     *
     * @property {regex|string} Pattern class selectors must follow
     * @property {object}       options
     *                          - `resolveNestedSelectors` {bool} This option will resolve nested selectors with `&`
     *                                                            interpolation;
     *                                                            default: false
     *
     */
    'selector-class-pattern': [
        '^[a-z0-9\\-]+$',
        {
            'resolveNestedSelectors': false,
        },
    ],

    /**
     * Specify a list of allowed combinators.
     *
     * @property {string|string[]} List of allowed combinators
     */
    'selector-combinator-allowed-list': null,

    /**
     * Specify a list of disallowed combinators.
     *
     * @property {string|string[]} List of disallowed combinators
     */
    'selector-combinator-disallowed-list': null,

    /**
     * Specify a pattern for ID selectors.
     *
     * @property {regex|string} Pattern ID selectors must follow
     */
    'selector-id-pattern': null,

    /**
     * Limit the number of attribute selectors in a selector.
     *
     * @property {int}    Maximum attribute selectors allowed
     * @property {object} options
     *                    - `ignoreAttributes` {regex[]|string[]} Attribute patterns to ignore
     */
    'selector-max-attribute': null,

    /**
     * Limit the number of classes in a selector.
     *
     * @property {int} Maximum classes allowed
     */
    'selector-max-class': null,

    /**
     * Limit the number of combinators in a selector.
     *
     * @property {int} Maximum combinators selectors allowed
     */
    'selector-max-combinators': null,

    /**
     * Limit the number of compound selectors in a selector.
     *
     * @property {int} Maximum compound selectors allowed
     */
    'selector-max-compound-selectors': 5,

    /**
     * Limit the number of adjacent empty lines within selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by ths rule.
     *
     * @property {int} Maximum number of adjacent empty lines allowed
     */
    'selector-max-empty-lines': 0,

    /**
     * Limit the number of ID selectors in a selector.
     *
     * @property {int}    Maximum universal selectors allowed
     * @property {object} options
     *                    - `ignoreContextFunctionalPseudoClasses` {regex[]|string[]} Ignore selectors inside of
     *                                                                                specified functional pseudo-
     *                                                                                classes that provide evaluation
     *                                                                                contexts
     */
    'selector-max-id': [
        1,
        {
            'ignoreContextFunctionalPseudoClasses': [],
        },
    ],

    /**
     * Limit the number of pseudo-classes in a selector.
     *
     * @property {int} Maximum pseudo-classes allowed
     */
    'selector-max-pseudo-class': null,

    /**
     * Limit the specificity of selectors.
     *
     * @property {string} Maximum specificity allowed;
     *                    format: 'id,class,type';
     *                    e.g.: '0,2,0'
     * @property {object} options
     *                    - `ignoreSelectors` {regex[]|string[]} Selector patterns to ignore
     */
    'selector-max-specificity': null,

    /**
     * Limit the number of type selectors in a selector.
     *
     * @property {int}    Maximum type selectors allowed
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `child`        Discount child type selectors
     *                                          - `compounded`   Discount compounded type selectors
     *                                          - `descendant`   Discount descendant type selectors
     *                                          - `next-sibling` Discount next-sibling type selectors
     *                    - `ignoreTypes` {regex[]|string[]} Patterns of types to ignore
     */
    'selector-max-type': null,

    /**
     * Limit the number of universal selectors in a selector.
     *
     * @property {int} Maximum universal selectors allowed
     */
    'selector-max-universal': null,

    /**
     * Specify a pattern for the selectors of rules nested within rules.
     *
     * @property {regex|string} Pattern for selectors
     */
    'selector-nested-pattern': null,

    /**
     * Disallow qualifying a selector by type.
     *
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `attribute` Allow attribute selectors qualified by type
     *                                          - `class`     Allow class selectors qualified by type
     *                                          - `id`        Allow ID selectors qualified by type
     */
    'selector-no-qualifying-type': null,

    /**
     * Disallow vendor prefixes for selectors.
     *
     * @property {object} options
     *                    - `ignoreSelectors` {regex[]|string[]} Ignore vendor prefixes for selectors
     */
    'selector-no-vendor-prefix': [
        true,
        {
            'ignoreSelectors': [],
        },
    ],

    /**
     * Specify a list of allowed pseudo-class selectors.
     *
     * @property {regex[]|string[]} Allowed pseudo-class selectors
     */
    'selector-pseudo-class-allowed-list': null,

    /**
     * Specify a list of disallowed pseudo-class selectors.
     *
     * @property {regex[]|string[]} Disallowed pseudo-class selectors
     */
    'selector-pseudo-class-disallowed-list': null,

    /**
     * Specify a list of allowed pseudo-element selectors.
     *
     * @property {regex[]|string[]} Allowed pseudo-element selectors
     */
    'selector-pseudo-element-allowed-list': null,

    /**
     * Specify single or double colon notation for applicable pseudo-elements.
     *
     * @property {string}
     *                    - `single` Applicable pseudo-elements must always use the single colon notation
     *                    - `double` Applicable pseudo-elements must always use the double colon notation
     */
    'selector-pseudo-element-colon-notation': 'double',

    /**
     * Specify a list of disallowed pseudo-element selectors.
     *
     * @property {regex[]|string[]} Disallowed pseudo-element selectors
     */
    'selector-pseudo-element-disallowed-list': null,
};

/**
 * @type {object}
 */
let stylelintStylisticIssues = {
    /**
     * Require or disallow an empty line before at-rules.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be an empty line before at-rules
     *                    - `never`  There must never be an empty line before at-rules
     * @property {object} options
     *                    - `except`        {string[]}
     *                                                 - `after-same-name`                     Reverse the primary
     *                                                                                         option for at-rules that
     *                                                                                         follow another at-rule
     *                                                                                         with the same name
     *                                                 - `inside-block`                        Reverse the primary
     *                                                                                         option for at-rules that
     *                                                                                         are inside a block
     *                                                 - `blockless-after-same-name-blockless` Reverse the primary
     *                                                                                         option for blockless at-
     *                                                                                         rules that follow
     *                                                                                         another blockless at-
     *                                                                                         rule with the same name
     *                                                 - `blockless-after-blockless`           Reverse the primary
     *                                                                                         option for blockless at-
     *                                                                                         rules that follow
     *                                                                                         another blockless at-
     *                                                                                         rule
     *                                                 - `first-nested`                        Reverse the primary
     *                                                                                         option for at-rules that
     *                                                                                         are nested and the first
     *                                                                                         child of their parent
     *                                                                                         node
     *                    - `ignore`        {string[]}
     *                                                 - `after-comment`                       Ignore at-rules that
     *                                                                                         follow a comment
     *                                                 - `first-nested`                        Ignore at-rules that are
     *                                                                                         nested and the first
     *                                                                                         child of their parent
     *                                                                                         node
     *                                                 - `inside-block`                        Ignore at-rules that are
     *                                                                                         inside a block
     *                                                 - `blockless-after-same-name-blockless` Ignore blockless at-
     *                                                                                         rules that follow
     *                                                                                         another blockless at-
     *                                                                                         rule with the same name
     *                                                 - `blockless-after-blockless`           Ignore blockless at-
     *                                                                                         rules that follow
     *                                                                                         another blockless at-
     *                                                                                         rule
     *                    - `ignoreAtRules` {string[]} Ignore specified at-rules
     */
    'at-rule-empty-line-before': [
        'always',
        {
            'except': [
                'first-nested',
            ],
            'ignore': [
                'after-comment',
            ],
            'ignoreAtRules': [],
        },
    ],

    /**
     * Specify lowercase or uppercase for at-rules names.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` At-rule names must be lowercase
     *                    - `upper` At-rule names must be uppercase
     */
    'at-rule-name-case': 'lower',

    /**
     * Require a newline after at-rule names.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after at-rule names
     *                    - `always-multi-line` There must always be a newline after at-rule names with multi-line
     *                                          parameters
     */
    'at-rule-name-newline-after': 'always-multi-line',

    /**
     * Require a single space after at-rule names.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after at-rule names
     *                    - `always-single-line` There must always be a single space after at-rule names in single-line declaration blocks
     */
    'at-rule-name-space-after': 'always-single-line',

    /**
     * Require a newline after the semicolon of at-rules.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a newline after the semicolon
     */
    'at-rule-semicolon-newline-after': 'always',

    /**
     * Require a single space or disallow whitespace before the semicolons of at-rules.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the semicolons
     *                    - `never`  There must never be a single space before the semicolons
     */
    'at-rule-semicolon-space-before': 'never',

    /**
     * Require or disallow an empty line before the closing brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always-multi-line` Require an empty line before the closing brace
     *                    - `never`             Disallow empty lines before the closing brace
     * @property {object} options
     *                    - `except` {string[]}
     *                                          - `after-closing-brace` When a file is nested, reverse the primary
     *                                                                  option
     */
    'block-closing-brace-empty-line-before': [
        'never',
        {
            'except': [],
        },
    ],

    /**
     * Require a newline or disallow whitespace after the closing brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a newline after the closing brace
     *                    - `always-multi-line`  There must always be a newline after the closing brace in multi-line
     *                                           blocks
     *                    - `always-single-line` There must always be a newline after the closing brace in single-line
     *                                           blocks
     *                    - `never-multi-line`   There must never be whitespace after the closing brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  There must never be whitespace after the closing brace in single-line
     *                                           blocks
     * @property {object} options
     *                    - `ignoreAtRules` {regex[]|string[]} Ignore specified at-rules
     */
    'block-closing-brace-newline-after': [
        'always',
        {
            'ignoreAtRules': [],
        },
    ],

    /**
     * Require a newline or disallow whitespace before the closing brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the closing brace
     *                    - `always-multi-line` There must always be a newline before the closing brace in multi-line
     *                                          blocks
     *                    - `never-multi-line`  There must never be whitespace before the closing brace in multi-line
     *                                          blocks
     */
    'block-closing-brace-newline-before': 'always',

    /**
     * Require a single space or disallow whitespace after the closing brace of blocks.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the closing brace
     *                    - `always-multi-line`  There must always be a single space after the closing brace in multi-
     *                                           line blocks
     *                    - `always-single-line` There must always be a single space after the closing brace in single-
     *                                           line blocks
     *                    - `never`              There must never be whitespace after the closing brace
     *                    - `never-multi-line`   There must never be whitespace after the closing brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  There must never be whitespace after the closing brace in single-line
     *                                           blocks
     */
    'block-closing-brace-space-after': null,

    /**
     * Require a single space or disallow whitespace before the closing brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the closing brace
     *                    - `always-multi-line`  There must always be a single space before the closing brace in multi-
     *                                           line blocks
     *                    - `always-single-line` There must always be a single space before the closing brace in
     *                                           single-line blocks
     *                    - `never`              There must never be whitespace before the closing brace
     *                    - `never-multi-line`   There must never be whitespace before the closing brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  there must never be whitespace before the closing brace in single-line
     *                                           blocks
     */
    'block-closing-brace-space-before': null,

    /**
     * Require a newline after the opening brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the opening brace
     *                    - `always-multi-line` There must always be a newline after the opening brace in multi-line
     *                                          blocks
     *                    - `never-multi-line`  There must never be whitespace after the opening brace in multi-line
     *                                          blocks
     */
    'block-opening-brace-newline-after': 'always',

    /**
     * Require a newline or disallow whitespace before the opening brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a newline before the opening brace
     *                    - `always-multi-line`  There must always be a newline before the opening brace in multi-line
     *                                           blocks
     *                    - `always-single-line` There must always be a newline before the opening brace in single-line
     *                                           blocks
     *                    - `never-multi-line`   There must never be whitespace before the opening brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  There must never be whitespace before the opening brace in single-line
     *                                           blocks
     */
    'block-opening-brace-newline-before': null,

    /**
     * Require a single space or disallow whitespace after the opening brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the opening brace
     *                    - `always-multi-line`  There must always be a single space after the opening brace in multi-
     *                                           line blocks
     *                    - `always-single-line` There must always be a single space after the opening brace in single-
     *                                           line blocks
     *                    - `never`              There must never be whitespace after the opening brace
     *                    - `never-multi-line`   There must never be whitespace after the opening brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  There must never be whitespace after the opening brace in single-line
     *                                           blocks
     */
    'block-opening-brace-space-after': null,

    /**
     * Require a single space or disallow whitespace before the opening brace of blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the opening brace
     *                    - `always-multi-line`  There must always be a single space before the opening brace in multi-
     *                                           line blocks
     *                    - `always-single-line` There must always be a single space before the opening brace in
     *                                           single-line blocks
     *                    - `never`              There must never be whitespace before the opening brace
     *                    - `never-multi-line`   There must never be whitespace before the opening brace in multi-line
     *                                           blocks
     *                    - `never-single-line`  There must never be whitespace before the opening brace in single-line
     *                                           blocks
     * @property {object} options
     *                    - `ignoreAtRules`   {regex[]|string[]} Patterns of at-rules to ignore
     *                    - `ignoreSelectors` {regex[]|string[]} Patterns of selectors to ignore
     */
    'block-opening-brace-space-before': [
        'always',
        {
            'ignoreAtRules': [],
            'ignoreSelectors': [],
        },
    ],

    /**
     * Specify lowercase or uppercase for hex colors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Hex colors must be lowercase
     *                    - `upper` Hex colors must be uppercase
     */
    'color-hex-case': 'lower',

    /**
     * Specify short or long notation for hex colors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `short` Hex colors must be in short notation
     *                    - `long`  Hex colors must be in long notation
     */
    'color-hex-length': 'short',

    /**
     * Require or disallow an empty line before comments.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be an empty line before comments
     *                    - `never`  There must never be an empty line before comments
     * @property {object} options
     *                    - `except` {string[]}
     *                                                          - `first-nested`       reverse the primary option for
     *                                                                                 comments that are nested and the
     *                                                                                 first child of their parent node
     *                    - `ignore` {string[]}
     *                                                          - `after-comment`      Ignore comments that follow
     *                                                                                 another comment
     *                                                          - `stylelint-commands` Ignore comments that deliver
     *                                                                                 commands to stylelint
     *                    - `ignoreComments` {regex[]|string[]} Ignore comments matching the given regular expressions
     *                                                          or strings
     */
    'comment-empty-line-before': null,

    /**
     * Require or disallow whitespace on the inside of comment markers.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be whitespace inside the markers
     *                    - `never`  There must never be whitespace inside the markers
     */
    'comment-whitespace-inside': 'always',

    /**
     * Require or disallow an empty line before custom properties.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` Require an empty line before custom properties
     *                    - `never`  Disallow empty lines before custom properties
     * @property {object} options
     *                    - `except` {string[]}
     *                                          - `after-comment`         Reverse the primary option for custom
     *                                                                    properties that follow a comment
     *                                          - `after-custom-property` Reverse the primary option for custom
     *                                                                    properties that follow another custom
     *                                                                    property
     *                                          - `first-nested`          Reverse the primary option for custom
     *                                                                    properties that are nested and the first
     *                                                                    child of their parent node
     *                    - `ignore` {string[]}
     *                                          - `after-comment`            Ignore custom properties that follow a
     *                                                                       comment
     *                                          - `first-nested`             Ignore custom properties that are nested
     *                                                                       and the first child of their parent node
     *                                          - `inside-single-line-block` Ignore custom properties that are inside
     *                                                                       single-line blocks
     */
    'custom-property-empty-line-before': [
        'always',
        {
            'except': [
                'after-custom-property',
                'first-nested',
            ],
            'ignore': [],
        },
    ],

    /**
     * Require a single space or disallow whitespace after the bang of declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space after the bang
     *                    - `never`  There must never be whitespace after the bang
     */
    'declaration-bang-space-after': 'never',

    /**
     * Require a single space or disallow whitespace before the bang of declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the bang
     *                    - `never`  There must never be whitespace before the bang
     */
    'declaration-bang-space-before': 'always',

    /**
     * Require a newline or disallow whitespace after the semicolons of declaration blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the semicolon
     *                    - `always-multi-line` There must always be a newline after the semicolon in multi-line rules
     *                    - `never-multi-line`  There must never be whitespace after the semicolon in multi-line rules
     */
    'declaration-block-semicolon-newline-after': 'always',

    /**
     * Require a newline or disallow whitespace before the semicolons of declaration blocks.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the semicolon
     *                    - `always-multi-line` There must always be a newline before the semicolon in multi-line rules
     *                    - `never-multi-line`  there must never be whitespace before the semicolon in multi-line rules
     */
    'declaration-block-semicolon-newline-before': 'never-multi-line',

    /**
     * Require a single space or disallow whitespace after the semicolons of declaration blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the semicolon
     *                    - `always-single-line` There must always be a single space after the semicolon in single-line declaration blocks
     *                    - `never`              There must never be whitespace after the semicolon
     *                    - `never-multi-line`   There must never be whitespace after the semicolon in single-line declaration blocks
     */
    'declaration-block-semicolon-space-after': 'always-single-line',

    /**
     * Require a single space or disallow whitespace before the semicolons of declaration blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the semicolon
     *                    - `always-single-line` There must always be a single space before the semicolon in single-line declaration blocks
     *                    - `never`              There must never be whitespace before the semicolon
     *                    - `never-single-line`  There must never be whitespace before the semicolon in single-line declaration blocks
     */
    'declaration-block-semicolon-space-before': 'never',

    /**
     * Require or disallow a trailing semicolon within declaration blocks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a trailing semicolon
     *                    - `never`  There must never e a trailing semicolon
     */
    'declaration-block-trailing-semicolon': 'always',

    /**
     * Require a newline or disallow whitespace after the colon of declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the colon
     *                    - `always-multi-line` There must always be a newline after the colon if the declaration's
     *                                          value is multi-line
     */
    'declaration-colon-newline-after': 'always-multi-line',

    /**
     * Require a single space or disallow whitespace after the colon of declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the colon
     *                    - `always-single-line` There must always be a single space after the colon if the
     *                                           declaration's value is single-line
     *                    - `never`              There must never be whitespace after the colon
     */
    'declaration-colon-space-after': 'always-single-line',

    /**
     * Require a single space or disallow whitespace before the colon of declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the colon
     *                    - `never`  There must never be whitespace before the colon
     */
    'declaration-colon-space-before': 'never',

    /**
     * Require or disallow an empty line before declarations.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be an empty line before declarations
     *                    - `never`  There must never be an empty line before declarations
     * @property {object} options
     *                    - `except` {string[]}
     *                                          - `after-comment`     Reverse the primary option for declarations that
     *                                                                follow a comment
     *                                          - `after-declaration` Reverse the primary option for declarations that
     *                                                                follow another declaration
     *                                          - `first-nested`      Reverse the primary option for declarations that
     *                                                                are nested and the first child of their parent
     *                                                                node
     *                    - `ignore` {string[]}
     *                                          - `after-comment`           Ignore declarations that follow a comment
     *                                          - `after-declaration`       Ignore declarations that follow another
     *                                                                      declaration
     *                                          - `first-nested`            Ignore declarations that are nested and the
     *                                                                      first child of their parent node
     *                                          - inside-single-line-block` Ignore declarations that are inside single-
     *                                                                      line blocks
     */
    'declaration-empty-line-before': [
        'always',
        {
            'except': [
                'after-declaration',
                'first-nested',
            ],
            'ignore': [],
        },
    ],

    /**
     * Specify whether or not quotation marks should be used around font family names.
     *
     * @property {string}
     *                    - `always-unless-keyword`    Expect quotes around every font-family name that is not a
     *                                                 keyword
     *                    - `always-where-recommended` Expect quotes only when quotes are recommended (around font-
     *                                                 family names that contain white space, digits, or punctuation
     *                                                 characters other than hyphens), and disallow quotes in all other
     *                                                 cases
     *                    - `always-where-required`    Expect quotes only when quotes are required (around font-family
     *                                                 names when they are not valid CSS identifiers), and disallow
     *                                                 quotes in all other cases
     */
    'font-family-name-quotes': 'always-unless-keyword',

    /**
     * Require a newline or disallow whitespace after the commas of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the commas
     *                    - `always-multi-line` There must always be a newline after the commas in multi-line functions
     *                    - `never-multi-line`  There must never be whitespace after the commas in multi-line functions
     */
    'function-comma-newline-after': 'always-multi-line',

    /**
     * Require a newline or disallow whitespace before the commas of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the commas
     *                    - `always-multi-line` There must always be a newline before the commas in multi-line
     *                                          functions
     *                    - `never-multi-line`  There must never be whitespace before the commas in multi-line
     *                                          functions
     */
    'function-comma-newline-before': 'never-multi-line',

    /**
     * Require a single space or disallow whitespace after the commas of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the commas
     *                    - `always-single-line` There must always be a single space after the commas in single-line
     *                                           functions
     *                    - `never`              there must never be whitespace after the commas
     *                    - `never-single-line`  There must never be whitespace after the commas in single-line
     *                                           functions
     */
    'function-comma-space-after': 'always-single-line',

    /**
     * Require a single space or disallow whitespace before the commas of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the commas
     *                    - `always-single-line` There must always be a single space before the commas in single-line
     *                                           functions
     *                    - `never`              there must never be whitespace before the commas
     *                    - `never-single-line`  There must never be whitespace before the commas in single-line
     *                                           functions
     */
    'function-comma-space-before': 'never',

    /**
     * Limit the number of adjacent empty lines within functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {int} Maximum number of adjacent empty lines allowed
     */
    'function-max-empty-lines': 0,

    /**
     * Specify lowercase or uppercase for function names.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Function names must be lowercase
     *                    - `upper` Function names must be uppercase
     * @property {object} options
     *                    - `ignoreFunctions` {regex[]|string[]} Ignore case of specific function names
     */
    'function-name-case': [
        'lower',
        {
            'ignoreFunctions': [],
        },
    ],

    /**
     * Require a newline or disallow whitespace on the inside of the parentheses of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline inside the parentheses
     *                    - `always-multi-line` There must always be a newline inside the parentheses of multi-line
     *                                          functions
     *                    - `never-multi-line`  There must never be a newline inside the parentheses of multi-line
     *                                          functions
     */
    'function-parentheses-newline-inside': 'always-multi-line',

    /**
     * Require a single space or disallow whitespace on the inside of the parentheses of functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space inside of the parentheses
     *                    - `always-single-line` There must always be a single space inside of the parentheses of
     *                                           single-line functions
     *                    - `never`              There must never be a single space inside of the parentheses
     *                    - `never-single-line`  There must never be a single space inside of the parentheses of
     *                                           single-line functions
     */
    'function-parentheses-space-inside': 'never',

    /**
     * Require or disallow quotes for urls.
     *
     * @property {string}
     *                    - `always` Urls must always be quoted
     *                    - `never`  Urls must never be quoted
     * @property {object} options
     *                    - `except` {string[]}
     *                                          - `empty` Reverse the primary option for functions that have no
     *                                                    arguments
     */
    'function-url-quotes': [
        'always',
        {
            'except': [
                'empty',
            ],
        },
    ],

    /**
     * Require or disallow whitespace after functions.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be whitespace after the function
     *                    - `never`  there must never be whitespace after the function
     */
    'function-whitespace-after': 'always',

    /**
     * Specify indentation.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {int|string}
     *                        - {int} Number of spaces used for indentation
     *                        - `tab` Tabs should be used for indentation
     * @property {object}     options
     *                        - `baseIndentLevel`    {int|string} By default, the indent level of the CSS code block in
     *                                                            non-CSS-like files is determined by the shortest
     *                                                            indent of non-empty line. The setting
     *                                                            `baseIndentLevel` allows you to define a relative
     *                                                            indent level based on CSS code block opening or
     *                                                            closing line.
     *                        - `indentClosingBrace` {bool}
     *                                                            - `true` The closing brace of a block will be
     *                                                                     expected at the same indentation level as
     *                                                                     the block's inner nodes
     *                        - `indentInsideParens` {string}     By default, one extra indentation is expected after
     *                                                            newlines inside parentheses, and the closing
     *                                                            parenthesis is expected to have no extra indentation
     *                                                            - `twice`                       Expect two extra
     *                                                                                            indentations after
     *                                                                                            newlines inside
     *                                                                                            parentheses, and
     *                                                                                            expect the closing
     *                                                                                            parenthesis to have
     *                                                                                            one extra indentation
     *                                                            - `once-at-root-twice-in-block` You want the behavior
     *                                                                                            of "once", as
     *                                                                                            documented above,
     *                                                                                            when the
     *                                                                                            parenthetical
     *                                                                                            expression is part of
     *                                                                                            a node that is an
     *                                                                                            immediate descendent
     *                                                                                            of the root - i.e.:
     *                                                                                            not inside a block.
     *                                                                                            And you want the
     *                                                                                            behavior of "twice",
     *                                                                                            as documented above,
     *                                                                                            when the
     *                                                                                            parenthetical
     *                                                                                            expression is part of
     *                                                                                            a node that is inside
     *                                                                                            a block.
     *
     */
    'indentation': [
        4,
        {
            'baseIndentLevel': 1,
            'indentClosingBrace': false,
        },
    ],

    /**
     * Specify unix or windows linebreaks.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `unix`    Linebreaks must always be LF (`\n`)
     *                    - `windows` Linebreaks must always be CRLF (`\r\n`)
     */
    'linebreaks': 'unix',

    /**
     * Require a single space or disallow whitespace after the colon in media features.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space after the colon
     *                    - `never`  There must never be whitespace after the colon
     */
    'media-feature-colon-space-after': 'always',

    /**
     * Require a single space or disallow whitespace before the colon in media features.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the colon
     *                    - `never`  There must never be whitespace before the colon
     */
    'media-feature-colon-space-before': 'never',

    /**
     * Specify lowercase or uppercase for media feature names.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Feature names muse be lowercase
     *                    - `upper` Feature names must be uppercase
     */
    'media-feature-name-case': 'lower',

    /**
     * Require a single space or disallow whitespace on the inside of the parentheses within media features.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space inside the parentheses
     *                    - `never`  There must never be whitespace inside the parentheses
     */
    'media-feature-parentheses-space-inside': 'never',

    /**
     * Require a single space or disallow whitespace after the range operator in media features.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space after the range operator
     *                    - `never`  There must never be whitespace after the range operator
     */
    'media-feature-range-operator-space-after': 'always',

    /**
     * Require a single space or disallow whitespace before the range operator in media features.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the range operator
     *                    - `never`  There must never be whitespace before the range operator
     */
    'media-feature-range-operator-space-before': 'always',

    /**
     * Require a newline or disallow whitespace after the commas of media query lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the commas
     *                    - `always-multi-line` There must always be a newline after the commas in multi-line query lists
     *                    - `never-multi-line`  There must never be whitespace after the commas in multi-line query lists
     */
    'media-query-list-comma-newline-after': 'always-multi-line',

    /**
     * Require a newline or disallow whitespace before the commas of media query lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the commas
     *                    - `always-multi-line` There must always be a newline before the commas in multi-line query lists
     *                    - `never-multi-line`  There must never be whitespace before the commas in multi-line query lists
     */
    'media-query-list-comma-newline-before': 'never-multi-line',

    /**
     * Require a single space or disallow whitespace after the commas of media query lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the commas
     *                    - `always-single-line` There must always be a single space after the commas in single-line media query lists
     *                    - `never`              There must never be whitespace after the commas
     *                    - `never-single-line`  There must never be whitespace after the commas in single-line media query lists
     */
    'media-query-list-comma-space-after': 'always-single-line',

    /**
     * Require a single space or disallow whitespace before the commas of media query lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the commas
     *                    - `always-single-line` There must always be a single space before the commas in single-line media query lists
     *                    - `never`              There must never be whitespace before the commas
     *                    - `never-single-line`  There must never be whitespace before the commas in single-line media query lists
     */
    'media-query-list-comma-space-before': 'never',

    /**
     * Limit the number of adjacent empty lines.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {int}    Maximum number of adjacent empty lines allowed
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `comments` Only enforce adjacent empty limit for lines that are not
     *                                                       comments
     */
    'max-empty-lines': [
        1,
        {
            'ignore': [],
        },
    ],

    /**
     * Limit the length of a line.
     *
     * @property {int} Maximum number of characters allowed
     * @property {object} options
     *                    - `ignore`        {string[]}
     *                                                 - `non-comments` Only enforce the line limit for lines within
     *                                                                  comments
     *                                                 - `comments`     Only enforce the line limit for lines that are
     *                                                                  not comments
     *                    - `ignorePattern` {regex}    Ignore any line that matches the given regex pattern, regardless
     *                                                 of whether it is a comment or not
     */
    'max-line-length': [
        80,
        {
            'ignore': [
                'non-comments',
            ],
            'ignorePattern': [
                '/(@see|@link).+/',
            ],
        },
    ],

    /**
     * Disallow end-of-line whitespace.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {bool}
     * @property {object} options
     *                    - `ignore` {string[]}
     *                                          - `empty-lines` Allow end-of-line whitespace for lines that are only whitespace
     */
    'no-eol-whitespace': [
        true,
        {
            'ignore': [],
        },
    ],

    /**
     * Disallow missing end-of-source newlines.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {bool}
     */
    'no-missing-end-of-source-newline': true,

    /**
     * Disallow empty first lines.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {bool}
     */
    'no-empty-first-line': true,

    /**
     * Require or disallow a leading zero for fractional numbers less than 1.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a leading zero
     *                    - `never`  There must never be a leading zero
     */
    'number-leading-zero': 'always',

    /**
     * Disallow trailing zeros in numbers.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     */
    'number-no-trailing-zeros': true,

    /**
     * Specify lowercase or uppercase for properties.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Properties must be lowercase
     *                    - `upper` Properties must be uppercase
     */
    'property-case': 'lower',

    /**
     * Require or disallow an empty line before rules.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be an empty line before rules
     *                    - `always-multi-line` There must always be an empty line before multi-line rules
     *                    - `never`             There must never be an empty line before rules
     *                    - `never-multi-line`  There must never be an empty line before mutli-line rules
     * @property {object} options
     *                    - `except` {string[]}
     *                                          - `after-rule`                  Reverse the primary option for rules
     *                                                                          that follow another rule
     *                                          - `after-single-line-comment`   Reverse the primary option for rules
     *                                                                          that follow a single-line comment
     *                                          - `first-nested`                Reverse the primary option for rules
     *                                                                          that rare nested and the first child of
     *                                                                          their parent node
     *                                          - `inside-block`                Reverse the primary option for rules
     *                                                                          that are inside a block
     *                                          - `inside-block-and-after-rule` Reverse the primary option for rules
     *                                                                          that are inside a block and follow
     *                                                                          another rule
     *                    - `ignore` {string[]}
     *                                          - `after-comment` Ignore rules that follow a comment
     *                                          - `first-nested`  Ignore rules that are nested and the first child of
     *                                                            their parent node
     *                                          - `inside-block`  Ignore rules that are inside a block
     */
    'rule-empty-line-before': [
        'always-multi-line',
        {
            'except': [
                'first-nested',
            ],
            'ignore': [
                'after-comment',
            ],
        },
    ],

    /**
     * Require a single space or disallow whitespace on the inside of the brackets within attribute selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space inside the brackets
     *                    - `never`  There must never be whitespace inside the brackets
     */
    'selector-attribute-brackets-space-inside': 'never',

    /**
     * Require a single space or disallow whitespace after operators within attribute selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space after the operator
     *                    - `never`  There must never be a single space after the operator
     */
    'selector-attribute-operator-space-after': 'never',

    /**
     * Require a single space or disallow whitespace before operators within attribute selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the operator
     *                    - `never`  There must never be a single space before the operator
     */
    'selector-attribute-operator-space-before': 'never',

    /**
     * Require or disallow quotes for attribute values.
     *
     * @property {string}
     *                    - `always` Attribute values must always be quoted
     *                    - `never`  Attribute values must never be quoted
     */
    'selector-attribute-quotes': 'always',

    /**
     * Require a single space or disallow whitespace after the combinators of selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space after the combinators
     *                    - `never`  There must never be whitespace after the combinators
     */
    'selector-combinator-space-after': 'always',

    /**
     * Require a single space or disallow whitespace before the combinators of selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space before the combinators
     *                    - `never`  There must never be whitespace before the combinators
     */
    'selector-combinator-space-before': 'always',

    /**
     * Disallow non-space characters for descendant combinators of selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     */
    'selector-descendant-combinator-no-non-space': true,

    /**
     * Specify lowercase or uppercase for pseudo-class selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Pseudo-class selectors must be lowercase
     *                    - `upper` Pseudo-class selectors must be uppercase
     */
    'selector-pseudo-class-case': 'lower',

    /**
     * Require a single space or disallow whitespace on the inside of the parentheses within pseudo-class selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always` There must always be a single space inside the parentheses
     *                    - `never`  There must never be whitespace inside the parentheses
     */
    'selector-pseudo-class-parentheses-space-inside': 'never',

    /**
     * Specify lowercase or uppercase for pseudo-element selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Pseudo-element selectors must be lowercase
     *                    - `upper` Pseudo-element selectors must be uppercase
     */
    'selector-pseudo-element-case': 'lower',

    /**
     * Specify lowercase or uppercase for type selectors.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Type selectors must be lowercase
     *                    - `upper` Type selectors must be uppercase
     * @property {object} options
     *                    - `ignoreTypes {regex[]|string[]} Ignore specified type patterns
     */
    'selector-type-case': [
        'lower',
        {
            'ignoreTypes': [],
        },
    ],

    /**
     * Require a newline or disallow whitespace after the commas of selector lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after he commas
     *                    - `always-multi-line` There must always be a newline after the commas in multi-line selector
     *                                          lists
     *                    - `never-multi-line`  There must never be whitespace after the commas in multi-line selector
     *                                          lists
     */
    'selector-list-comma-newline-after': 'always',

    /**
     * Require a newline or disallow whitespace before the commas of selector lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the commas
     *                    - `always-multi-line` There must always be a newline before the commas in multi-line selector
     *                                          lists
     *                    - `never-multi-line`  There must never be whitespace before the commas in multi-line selector
     *                                          lists
     */
    'selector-list-comma-newline-before': 'never-multi-line',

    /**
     * Require a single space or disallow whitespace after the commas of selector lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the commas
     *                    - `always-single-line` There must always be a single space after the commas in single-line
     *                                           selector lists
     *                    - `never`              There must never be whitespace after the commas
     *                    - `never-single-line`  There must never be whitespace after the commas in single-line
     *                                           selector lists
     */
    'selector-list-comma-space-after': null,

    /**
     * Require a single space or disallow whitespace before the commas of selector lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the commas
     *                    - `never`              There must never be whitespace before the commas
     *                    - `always-single-line` There must always be a single space before the commas in single-line
     *                                           selector lists
     *                    - `never-single-line`  There must never be whitespace before the commas in single-line
     *                                           selector lists
     */
    'selector-list-comma-space-before': null,

    /**
     * Specify single or double quotes around strings.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `single` Strings must always be wrapped with single quotes
     *                    - `double` Strings must always be wrapped with double quotes
     * @property {object} options
     *                    - `avoidEscape` {bool} Allows strings to use single-quotes or double-quotes so long as the
     *                                           string contains a quote that would have to be escaped otherwise;
     *                                           default: true
     */
    'string-quotes': [
        'single',
        {
            'avoidEscape': true,
        },
    ],

    /**
     * Require or disallow the Unicode Byte Order Mark.
     *
     * @property {string}
     *                    - `always` Unicode Byte Order Mark must be used
     *                    - `never`  Unicode Byte Order Mark must not be used
     */
    'unicode-bom': 'never',

    /**
     * Specify lowercase or uppercase for units.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Units must be lowercase
     *                    - `upper` Units must be uppercase
     */
    'unit-case': 'lower',

    /**
     * Specify lowercase or uppercase for keywords values.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `lower` Keywords must be lowercase
     *                    - `upper' Keywords must be uppercase
     * @property {object} options
     *                    - `ignoreFunctions`  {regex[]|string[]} Ignore case of the values of the listed functions
     *                    - `ignoreKeywords`   {regex[]|string[]} Ignore case of keywords values
     *                    - `ignoreProperties` {regex[]|string[]} Ignore case of the values of the listed properties
     */
    'value-keyword-case': [
        'lower',
        {
            'ignoreFunctions': [],
            'ignoreKeywords': [],
            'ignoreProperties': [],
        },
    ],

    /**
     * Require a newline or disallow whitespace after the commas of value lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline after the commas
     *                    - `always-multi-line` There must always be a newline after the commas in multi-line value
     *                                          lists
     *                    - `never-multi-line`  There must never be a newline after the commas in multi-line value
     *                                          lists
     */
    'value-list-comma-newline-after': 'always-multi-line',

    /**
     * Require a newline or disallow whitespace before the commas of value lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`            There must always be a newline before the commas
     *                    - `always-multi-line` There must always be a newline before the commas in multi-line value
     *                                          lists
     *                    - `never-multi-line`  There must never be a newline before the commas in multi-line value
     *                                          lists
     */
    'value-list-comma-newline-before': 'never-multi-line',

    /**
     * Require a single space or disallow whitespace after the commas of value lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space after the commas
     *                    - `always-single-line` There must always be a single space after the commas in single-line
     *                                           value lists
     *                    - `never`              There must never be whitespace after the commas
     *                    - `never-single-line`  There must never be whitespace after the commas in single-line value
     *                                           lists
     */
    'value-list-comma-space-after': 'always-single-line',

    /**
     * Require a single space or disallow whitespace before the commas of value lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {string}
     *                    - `always`             There must always be a single space before the commas
     *                    - `always-single-line` There must always be a single space before the commas in single-line
     *                                           value lists
     *                    - `never`              There must never be whitespace before the commas
     *                    - `never-single-line`  There must never be whitespace before the commas in single-line value
     *                                           lists
     */
    'value-list-comma-space-before': 'never',

    /**
     * Limit the number of adjacent empty lines within value lists.
     *
     * The `--fix` option can automatically fix all of the problems reported by this rule.
     *
     * @property {int} Maximum number of adjacent empty lines allowed
     */
    'value-list-max-empty-lines': 0,
};

/**
 * Merge rule objects into a single object.
 *
 * @type {object}
 */
let rules = Object.assign(
    stylelintPossibleErrors,
    stylelintLimitLanguageFeatures,
    stylelintStylisticIssues,
);

/**
 * @type {object}
 */
module.exports = {
    rules: rules,
};
