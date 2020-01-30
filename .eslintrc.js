/**
 * Config file for ESLint.
 *
 * @package Config - ESLint
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

/**
 * These rules relate to possible syntax or logic errors in JavaScript code.
 *
 * @type {object}
 */
let ESLintPossibleErrors = {
    /**
     * A `for` loop with a stop condition that can never be reached, such as one with a counter that moves in the wrong
     * direction, will run infinitely. While there are occasions when an infinite loop is intended, the convention is
     * to construct such loops as `while` loops. More typically, an infinite for loop is a bug.
     */
    'for-direction': 'error',

    /**
     * This rule enforces that a return statement is present in property getters.
     *
     * @property {object} options
     *                            - `allowImplicit` {bool} Disallows implicitly returning `undefined` with a `return`
     *                                                     statement;
     *                                                     default: false
     */
    'getter-return': [
        'error',
        {
            'allowImplicit': false,
        },
    ],

    /**
     * This rule aims to disallow async Promise executor functions.
     */
    'no-async-promise-executor': 'error',

    /**
     * This rule disallows the use of `await` within loop bodies.
     */
    'no-await-in-loop': 'off',

    /**
     * The rule should warn against code that tries to compare against -0, since that will not work as intended. That
     * is, code like `x === -0` will pass for both +0 and -0. The author probably intended `Object.is(x, -0)`.
     */
    'no-compare-neg-zero': 'error',

    /**
     * This rule disallows ambiguous assignment operators in test conditions of `if`, `for`, `while`, and `do...while`
     * statements.
     *
     * @property {string} options
     *                            - `except-parens` Allows assignments in test conditions only if they are enclosed in
     *                                              parentheses (for example, to allow reassigning a variable in the
     *                                              test of a `while` or `do...while` loop)
     *                            - `always`        Disallows all assignments in test conditions
     *                            default: `except-parens`
     */
    'no-cond-assign': [
        'error',
        'except-parens',
    ],

    /**
     * This rule disallows calls to methods of the `console` object.
     *
     * @property {object} exceptions
     *                               - `allow` {array} An array of strings which area allowed methods of the console
     *                                                 object
     */
    'no-console': 'off',

    /**
     * This rule disallows constant expressions in the test condition of:
     *   - `if`, `for`, `while`, or `do...while` statement
     *   - `?:` ternary expression
     *
     * @property {object} options
     *                            - `checkLoops` {bool} Setting this option to `false` allows constant expression in
     *                                                  loops;
     *                                                  default: true
     */
    'no-constant-condition': [
        'error',
        {
            'checkLoops': false,
        },
    ],

    /**
     * This rule disallows control characters in regular expressions.
     */
    'no-control-regex': 'error',

    /**
     * This rule disallows `debugger` statements.
     */
    'no-debugger': 'error',

    /**
     * This rule disallows duplicate parameter names in function declarations or expressions. It does not apply to
     * arrow functions or class methods, because the parser reports the error.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-dupe-args': 'error',

    /**
     * This rule disallows duplicate conditions in the same `if-else-if` chain.
     */
    'no-dupe-else-if': 'off',

    /**
     * This rule disallows duplicate keys in object literals.
     */
    'no-dupe-keys': 'error',

    /**
     * This rule disallows duplicate test expressions in `case` clauses of `switch` statements.
     */
    'no-duplicate-case': 'error',

    /**
     * This rule disallows empty block statements. This rule ignores block statements which contain a comment (for
     * example, in an empty `catch` or `finally` block of a `try` statement to indicate that execution should continue
     * regardless of errors).
     *
     * @property {object} exceptions
     *                               - `allowEmptyCatch` {bool} Allows empty `catch` clauses (that is, which do not contain a
     *                                                          comment);
     *                                                          default: false
     */
    'no-empty': [
        'error',
        {
            'allowEmptyCatch': false,
        },
    ],

    /**
     * This rule disallows empty character classes in regular expressions.
     */
    'no-empty-character-class': 'error',

    /**
     * This rule disallows reassigning exceptions in `catch` clauses.
     */
    'no-ex-assign': 'error',

    /**
     * This rule disallows unnecessary boolean casts.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-boolean-cast': 'error',

    /**
     * This rule always ignores extra parentheses around the following:
     *   - RegExp literals such as `(/abc/).test(var)` to avoid conflicts with the wrap-regex rule
     *   - immediately-invoked function expressions (also known as IIFEs) such as `var x = (function () {})();` and
     *     `((function foo() {return 1;})())` to avoid conflicts with the wrap-iife rule
     *   - arrow function arguments to avoid conflicts with the arrow-parens rule
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                                  - `all`      Disallows unnecessary parentheses around any expression
     *                                  - `functions Disallows unnecessary parentheses only around function expressions
     *                                  default: `all`
     * @property {object} allExceptions This rule has an object option for exceptions to the `all` option
     *                                  - `"conditionalAssign": false`                    Allows extra parentheses
     *                                                                                    around assignments in
     *                                                                                    conditional test expressions
     *                                  - `"returnAssign": false`                         Allows extra parentheses
     *                                                                                    around assignments in
     *                                                                                    `return` statements
     *                                  - `"nestedBinaryExpressions": false`              Allows extra parentheses in
     *                                                                                    nested binary expressions
     *                                  - `"ignoreJSX": "none|all|multi-line|single-line" Allows extra parentheses
     *                                                                                    around no/all/multi-line/
     *                                                                                    single-line JSX components;
     *                                                                                    default: `none`
     *                                  - `"enforceForArrowConditionals": false`          Allows extra parentheses
     *                                                                                    around ternary expressions
     *                                                                                    which are the body of an
     *                                                                                    arrow function
     *                                  - `"enforceForSequenceExpressions": false`        Allows extra parentheses
     *                                                                                    around sequence expressions
     *                                  - `"enforceForNewInMemberExpressions": false`     Allows extra parentheses
     *                                                                                    around `new` expressions in
     *                                                                                    member expressions
     */
    'no-extra-parens': [
        'error',
        'functions',
    ],

    /**
     * This rule disallows unnecessary semicolons.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-semi': 'off',

    /**
     * This rule disallows reassigning `function` declarations.
     */
    'no-func-assign': 'error',

    /**
     * This rule warns the assignments, increments, and decrements of imported bindings.
     */
    'no-import-assign': 'off',

    /**
     * This rule requires that function declarations and, optionally, variable declarations be in the root of a program
     * or the body of a function.
     *
     * @property {string} options
     *                            - `functions` Disallows `function` declarations in nested blocks
     *                            - `both`      Disallows `function` and `var` declarations in nested blocks
     *                            default: `functions`
     */
    'no-inner-declarations': [
        'error',
        'functions',
    ],

    /**
     * This rule disallows invalid regular expression strings in `RegExp` constructors.
     *
     * @property {object} exceptions
     *                               - `allowConstructorFlags` {array} Array of flags
     */
    'no-invalid-regexp': 'error',

    /**
     * This rule is aimed at catching invalid whitespace that is not a normal tab and space. Some of these characters
     * may cause issues in modern browsers and others will be a debugging issue to spot.
     *
     * @property {object} exceptions
     *                               - `skipStrings`   {bool} Allows any whitespace characters in string literals;
     *                                                        default: true
     *                               - `skipComments`  {bool} Allows any whitespace characters in comments;
     *                                                        default: false
     *                               - `skipRegExps`   {bool} Allows any whitespace characters in regular expression literals;
     *                                                        default: false
     *                               - `skipTemplates` {bool} Allows any whitespace characters in template literals;
     *                                                        default: false
     *                               default: `"skipStrings": true`
     */
    'no-irregular-whitespace': [
        'error',
        {
            "skipStrings": true,
        },
    ],

    /**
     * This rule reports the regular expressions which include multiple code point characters in character class
     * syntax.
     */
    'no-misleading-character-class': 'error',

    /**
     * This rule disallows calling the `Math`, `JSON`, `Reflect` and `Atomics` objects as functions.
     */
    'no-obj-calls': 'error',

    /**
     * This rule disallows calling some `Object.prototype` methods directly on object instances.
     */
    'no-prototype-builtins': 'error',

    /**
     * This rule disallows multiple spaces in regular expression literals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-regex-spaces': 'error',

    /**
     * This rule disallows returning values from setters and reports `return` statements in setter functions.
     *
     * Only `return` without a value is allowed, as it's a control flow statement.
     *
     * This rule checks setters in:
     *   - object literals
     *   - class declarations and class expressions
     *   - property descriptors in `Object.create`, `Object.defineProperty`, `Object.defineProperties`, and
     *     `Reflect.defineProperty` methods of the global objects
     */
    'no-setter-return': 'off',

    /**
     * This rule disallows sparse array literals which have "holes" where commas are not preceded by elements. It does
     * not apply to a trailing comma following the last element.
     */
    'no-sparse-arrays': 'error',

    /**
     * This rule aims to warn when a regular string contains what looks like a template literal placeholder. It will
     * warn when it finds a string containing the template literal placeholder (`${something}`) that uses either `"` or
     * `'` for the quotes.
     */
    'no-template-curly-in-string': 'error',

    /**
     * This rule disallows confusing multiline expressions where a newline looks like it is ending a statement, but is
     * not.
     */
    'no-unexpected-multiline': 'error',

    /**
     * This rule disallows unreachable code after `return`, `throw`, `continue`, and `break` statements.
     */
    'no-unreachable': 'error',

    /**
     * This rule disallows `return`, `throw`, `break`, and `continue` statements inside finally blocks. It allows
     * indirect usages, such as in `function` or `class` definitions.
     */
    'no-unsafe-finally': 'error',

    /**
     * This rule disallows negating the left operand of the following relational operators:
     *   - `in` operator
     *   - `instanceof` operator
     *
     * @property {object} options
     *                            - `enforceForOrderingRelations` {bool} Disallows negation of the left-hand side of
     *                                                                   ordering relational operators (`<`, `>`, `<=`,
     *                                                                   `>=`);
     *                                                                   default: false
     */
    'no-unsafe-negation': [
        'error',
        {
            'enforceForOrderingRelations': false,
        }
    ],

    /**
     * This rule aims to report assignments to variables or properties where all of the following are true:
     *   - a variable or property is reassigned to a new value which is based on its old value
     *   - a `yield` or `await` expression interrupts the assignment after the old value is read, and before the new
     *     value is set
     *   - the rule cannot easily verify that the assignment is safe (e.g.: if an assigned variable is local and would
     *     not be readable from anywhere else while the function is paused)
     */
    'require-atomic-updates': 'off',

    /**
     * This rule disallows comparisons to 'NaN'.
     *
     * @property {object} options
     *                            - `enforceForSwitchCase` {bool} Disallows `case NaN` and `switch(NaN` statements;
     *                                                            default: false
     *                            - `enforceForIndexOf`    {bool} Disallows the use of `indexOf` and `lastIndexOf`
     *                                                            methods with `NaN`;
     *                                                            default: false
     */
    'use-isnan': [
        'error',
        {
            'enforceForSwitchCase': false,
            'enforceForIndexOf': false,
        },
    ],

    /**
     * This rule enforces comparing `typeof` expressions to valid string literals.
     *
     * @property {object} options
     *                            - `requireStringLiterals` {bool} Requires `typeof` expressions to only be compared to
     *                                                             string literals or other `typeof` expressions, and
     *                                                             disallows comparisons to any other value;
     *                                                             default: false
     */
    'valid-typeof': [
        'error',
        {
            'requireStringLiterals': true,
        },
    ],
};

/**
 * Merge rule objects into a single object.
 *
 * @type {unknown}
 */
let rules = Object.assign(
    ESLintPossibleErrors,
);

/**
 *
 * @type {object}
 */
module.exports = {
    env: {
        browser: true,
        es6: true,
    },
    parserOptions: {
        ecmaFeatures: {
            jsx: true,
        },
        ecmaVersion: 2020,
        sourceType: 'module',
    },
    rules: rules,
};
