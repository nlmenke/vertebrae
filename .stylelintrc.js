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
     *                                                           - `inside-string` Ignore colors that are inside a function
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
    'selector-class-pattern': null,

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
    'selector-pseudo-element-colon-notation': 'single',

    /**
     * Specify a list of disallowed pseudo-element selectors.
     *
     * @property {regex[]|string[]} Disallowed pseudo-element selectors
     */
    'selector-pseudo-element-disallowed-list': null,
};

/**
 * Merge rule objects into a single object.
 *
 * @type {object}
 */
let rules = Object.assign(
    stylelintPossibleErrors,
    stylelintLimitLanguageFeatures,
);

/**
 * @type {object}
 */
module.exports = {
    rules: rules,
};
