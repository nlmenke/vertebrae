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
 * Merge rule objects into a single object.
 *
 * @type {object}
 */
let rules = Object.assign(
    stylelintPossibleErrors,
);

/**
 * @type {object}
 */
module.exports = {
    rules: rules,
};
