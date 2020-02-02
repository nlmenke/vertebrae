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
 * these rules relate to better ways of doing things to help you avoid problems.
 *
 * @type {object}
 */
let ESLintBestPractices = {
    /**
     * This rule enforces a style where it requires to have a getter for every property which has a setter defined.
     *
     * By activating the option `getWithoutSet` it enforces the presence of a setter for every property which has a
     * getter defined.
     *
     * By default, this rule checks only object literals and property descriptors. If you want this rule to also check
     * class declarations and class expressions, activate the option `enforceForClassMembers`.
     *
     * @property {object} options
     *                            - `setWithoutGet`          {bool} Warn for setters without getters;
     *                                                              default: true
     *                            - `getWithoutSet`          {bool} Warn for getters without setters;
     *                                                              default: false
     *                            - `enforceForClassMembers` {bool} Additionally applies this rule to class getters/
     *                                                              setters;
     *                                                              default: false
     */
    'accessor-pairs': 'off',

    /**
     * This rule finds callback functions of the following methods, then checks usage of `return` statement.
     *   - `Array.from`
     *   - `Array.prototype.every`
     *   - `Array.prototype.filter`
     *   - `Array.prototype.find`
     *   - `Array.prototype.findIndex`
     *   - `Array.prototype.map`
     *   - `Array.prototype.reduce`
     *   - `Array.prototype.reduceRight`
     *   - `Array.prototype.some`
     *   - `Array.prototype.sort`
     *   - and above of typed arrays
     *
     * @property {object} options
     *                            - `allowImplicit` {bool} Allows implicitly returning `undefined` with a `return`
     *                                                     statement containing no expression;
     *                                                     default: false
     */
    'array-callback-return': 'off',

    /**
     * This rule aims to reduce the usage of variables outside of their binding context and emulate traditional block
     * scope from other languages. This is to help newcomers to the language avoid difficult bugs with variable
     * hoisting.
     */
    'block-scoped-var': 'off',

    /**
     * This rule is aimed to flag class methods that do not use `this`.
     *
     * @property {object} exceptions
     *                               - `exceptMethods` {array} Array of method names for which warnings are ignored
     */
    'class-methods-use-this': 'off',

    /**
     * This rule is aimed at reducing code complexity by capping the amount of cyclomatic complexity allowed in a
     * program. As such, it will warn when the cyclomatic complexity crosses the configured threshold.
     *
     * @property {object|int} options Object or maximum complexity integer
     *                                - `max` {int} Maximum complexity;
     *                                              default: 20
     */
    'complexity': 'off',

    /**
     * This rule requires `return` statements to either always or never specify values. This rule ignores function
     * definitions where the name begins with an uppercase letter, because constructors (when invoked with the new
     * operator) return the instantiated object implicitly if they do not return another object explicitly.
     *
     * @property {object} options
     *                            - `treatUndefinedAsUnspecified` {bool} Always either specify values or return
     *                                                                   `undefined` explicitly or implicitly;
     *                                                                   default: false
     */
    'consistent-return': 'off',

    /**
     * This rule is aimed at preventing bugs and increasing code clarity by ensuring that block statements are wrapped
     * in curly braces. It will warn when it encounters blocks that omit curly braces.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                            - `all`           All of the below options
     *                            - `multi`         Warns whenever `if`, `else`, `for`, `while`, or `do` are used
     *                                              without block statements as their body. However, you can specify
     *                                              that block statements should be used only when there are multiple
     *                                              statements in the block and warn when there is only one statement
     *                                              in the block
     *                            - `multi-line     Alternatively, you can relax the rule to allow brace-less single-
     *                                              line `if`, `else if`, `else`, `for`, `while`, or `do`, while still
     *                                              enforcing the use of curly braces for other instances
     *                            - `multi-or-nest` You can use another configuration that forces brace-less `if`,
     *                                              `else if`, `else`, `for`, `while`, or `do` if their body contains
     *                                              only one single-line statement and forces braces in all other cases
     *                            - `consistent`    When using any of the `multi*` options, you can add an option to
     *                                              enforce all bodies of a `if`, `else if`, and `else` chain to be
     *                                              with or without braces
     */
    'curly': [
        'error',
        'all',
    ],

    /**
     * This rule aims to require `default` case in `switch` statements. You may optionally include a `// no default`
     * after the last `case` if there is no `default` case. The comment may be in any desired case, such as `// No
     * Default`.
     *
     * @property {object} options
     *                            - `commentPattern` {string} Set the `commentPattern` option to a regular expression
     *                                                        string to change the default comment test pattern;
     *                                                        default: `/^no default$/i`
     */
    'default-case': [
        'error',
        {
            'commentPattern': '/^no default$/',
        },
    ],

    /**
     * This rule enforces default parameters to be the last of parameters.
     */
    'default-param-last': 'off',

    /**
     * This rule aims to enforce newline consistency in member expressions. This rule prevents the use of mixed
     * newlines around the dot in a member expression.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} dotLocation Where to require the dot in a member expression
     *                                - `object`
     *                                - `property`
     *                                default: `object`
     */
    'dot-location': [
        'error',
        'property',
    ],

    /**
     * This rule is aimed at maintaining code consistency and improving code readability by encouraging use of the dot
     * notation style whenever possible. As such, it will warn when it encounters an unnecessary use of square-bracket
     * notation.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `allowKeywords` {bool}   Set this option to false to follow EXMAScript version 3
     *                                                       compatible style, avoiding dot notation for reserved word
     *                                                       properties;
     *                                                       default: true
     *                            - `allowPattern`  {string} Set this option to a regular expression string to allow
     *                                                       bracket notation for property names that match a pattern;
     *                                                       default: (no pattern)
     */
    'dot-notation': [
        'error',
        {
            'allowKeywords': true,
        },
    ],

    /**
     * This rule is aimed at eliminating the type-unsafe equality operators.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                              - `always` Enforces the use of `===` and `!==` in every situation (except when you
     *                                         opt-in  to more specific handling of `null` (see below))
     *                              - `smart`  Enforces the use of `===` and `!==` except for these cases:
     *                                         - comparing two literal values
     *                                         - evaluating the value of `typeof`
     *                                         - comparing against `null`
     *                              default: `always`
     * @property {object} supported This rule optionally takes a second argument, which should be an object with the
     *                              following supported properties:
     *                              - `null` Customize how this rule treats `null` literals
     *                                       - `always` Always use `===` or `!==`
     *                                       - `never`  Never use `===` or `!--` with null
     *                                       - `ignore` Do not apply this rule to `null
     *                                       default: `always`
     */
    'eqeqeq': [
        'error',
        'always',
        {
            'null': 'ignore',
        },
    ],

    /**
     * This rule requires grouped definitions of accessor functions for the same property in object literals, class
     * declarations and class expressions.
     *
     * Optionally, this rule can also enforce consistent order (getBeforeSet or setBeforeGet).
     *
     * This rule does not enforce the existence of the pair for a getter or a setter. See accessor-pairs if you also
     * want to enforce getter/setter pairs.
     *
     * @property {string} order
     *                          - `anyOrder`     Does not enforce order
     *                          - `getBeforeSet` If a property has both a getter and setter, requires the getter to be
     *                                           defined before the setter
     *                          - `setBeforeGet` If a property has both a getter and setter, requires the setter to be
     *                                           defined before the getter
     *                          default: `anyOrder`
     */
    'grouped-accessor-pairs': 'off',

    /**
     * This rule is aimed at preventing unexpected behavior that could arise from using a `for in` loop without
     * filtering the results in the loop. As such, it will warn when `for in` loops do not filter their results with an
     * `if` statement.
     */
    'guard-for-in': 'off',

    /**
     * This rule enforces that each file may contain only a particular number of classes and no more.
     *
     * @property {int} maxClasses Maximum number of classes allowed in the file;
     *                            default: 1
     */
    'max-classes-per-file': 'off',

    /**
     * This rule is aimed at catching debugging code that should be removed and popup UI elements that should be
     * replaced with less obtrusive, custom UIs. As such, it will warn when it encounters `alert`, `prompt`, and
     * `confirm` function calls which are not shadowed.
     */
    'no-alert': 'off',

    /**
     * This rule is aimed at discouraging the use of deprecated and sub-optimal code by disallowing the use of
     * `arguments.caller` and `arguments.callee`. As such, it will warn when `arguments.caller` and `arguments.callee`
     * are used.
     */
    'no-caller': 'error',

    /**
     * This rule aims to prevent access to uninitialized lexical bindings as well as accessing hoisted functions across
     * case clauses.
     */
    'no-case-declarations': 'error',

    /**
     * This rule disallows return statements in the constructor of a class. Note that returning nothing with flow
     * control is allowed.
     */
    'no-constructor-return': 'off',

    /**
     * This is used to disambiguate the division operator to not confuse users.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-div-regex': 'off',

    /**
     * This rule is aimed at highlighting an unnecessary block of code following an `if` containing a return statement.
     * As such, it will warn when it encounters an `else` following a chain of `if`s, all of them containing a `return`
     * statement.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} exceptions
     *                               - `allowElseIf` {bool} Allows `else if` blocks after a return;
     *                                                      default: true
     */
    'no-else-return': 'off',

    /**
     * This rule is aimed at eliminating empty functions. A function will not be considered a problem if it contains a
     * comment.
     *
     * @property {object} exceptions This rule has an option to allow specific kinds of functions to be empty
     *                               - `allow` {array} A list of allowed function types
     *                                                 - `functions`          Normal functions
     *                                                 - `arrowFunctions`     Arrow functions
     *                                                 - `generatorFunctions` Generator functions
     *                                                 - `methods`            Class methods and method shorthands of
     *                                                                        object literals
     *                                                 - `generatorMethods`   Class methods and method shorthands of
     *                                                                        object literals with generator
     *                                                 - `getters`            Getters
     *                                                 - `setters`            Setters
     *                                                 - `constructors`       Class constructors
     *                                                 default: []
     */
    'no-empty-function': 'off',

    /**
     * This rule aims to flag any empty patterns in destructured objects and arrays, and as such, will report a problem
     * whenever one is encountered.
     */
    'no-empty-pattern': 'error',

    /**
     * This rule aims to reduce potential bugs and unwanted behavior by ensuring that comparisons to `null` only match
     * `null`, and not also `undefined`. As such it will flag comparisons to `null` when using `==` and `!=`.
     */
    'no-eq-null': 'error',

    /**
     * This rule is aimed at preventing potentially dangerous, unnecessary, and slow code by disallowing the use of the
     * `eval()` function. As such, it will warn whenever the `eval()` function is used.
     */
    'no-eval': 'error',

    /**
     * Disallows directly modifying the prototype of builtin objects.
     *
     * @property {object} options
     *                            - `exceptions` {array} List of builtins for which extensions will be allowed
     */
    'no-extend-native': 'error',

    /**
     * This rule is aimed at avoiding the unnecessary use of `bind()` and as such will warn whenever an immediately-
     * invoked function expression (IIFE) is using `bind()` and doesn't have an appropriate `this` value. This rule
     * won't flag usage of `bind()` that includes function argument binding.
     *
     * Note: Arrow functions can never have their `this` value set using `bind()`. This rule flags all uses of `bind()`
     * with arrow functions as a problem.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-bind': 'error',

    /**
     * This rule is aimed at eliminating unnecessary labels.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-label': 'off',

    /**
     * This rule is aimed at eliminating unintentional fallthrough of one case to the other. As such, it flags any
     * fallthrough scenarios that are not marked by a comment.
     *
     * @property {object} options
     *                            - `commentPattern` {string} Regular expression string to change the test for
     *                                                        intentional fallthrough comment
     */
    'no-fallthrough': 'error',

    /**
     * This rule is aimed at eliminating floating decimal points and will warn whenever a numeric value has a decimal
     * point but is missing a number either before or after it.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-floating-decimal': 'error',

    /**
     * This rule disallows modifications to read-only global variables.
     *
     * ESLint has the capability to configure global variables as read-only.
     *
     * @property {object} options
     *                            - `exceptions` {array} List of builtins for which reassignments will be allowed
     */
    'no-global-assign': 'error',

    /**
     * This rule is aimed to flag shorter notations for the type conversion, then suggest a more self-explanatory notation.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `boolean`       Warns shorter type conversions for `boolean` type;
     *                                              default: true
     *                            - `number`        Warns shorter type conversions for `number` type;
     *                                              default: true
     *                            - `string`        Warns shorter type conversions for `string` type;
     *                                              default: true
     *                            - `allow` {array} Each entry in this array can be one of `~`, `!!`, `+`, or `*` that
     *                                              are to be allowed;
     *                                              default: []
     *                                              Note: operator `+` in list would allow `+foo` (number coercion) as
     *                                              well as `'' + foo` (string coercion)
     */
    'no-implicit-coercion': 'off',

    /**
     * When working with browser scripts, developers often forget that variable and function declarations at the top-
     * level scope become global variables on the `window` object. As opposed to modules which have their own scope.
     * Globals should be explicitly assigned to `window` or `self` if that is the intent. Otherwise variables intended
     * to be local to the script should be wrapped in an IIFE.
     *
     * This rule disallows `var` and `function` declarations at the top-level script scope. This does not apply to ES
     * and CommonJS modules since they have a module scope.
     *
     * When the code is not in `strict` mode, an assignment to an undeclared variable creates a new global variable.
     * This will happen even is the code is in a function.
     *
     * This does not apply to ES modules since the module code is implicitly in `strict` mode.
     *
     * This rule also disallows re-declarations of read-only global variables and assignments to read-only global
     * variables.
     *
     * A read-only global variable can be a built-in ES global (e.g. `Array`), an environment specific global (e.g.
     * `window` in the browser environment), or a global variable defined as `readonly` in the configuration file or in
     * a global comment.
     *
     * Lexical declarations `const` and `let`, as well as `class` declarations, create variables that are block-scoped.
     *
     * However, when declared in the top-level of a browser script these variables are not 'script-scoped'. They are
     * actually created in the global scope and could produce name collisions with `var`, `const` and `let` variables
     * and `function` and `class` declarations from other scripts. This does not apply to ES and CommonJS modules.
     *
     * If the variable is intended to be local to the script, wrap the code with a block or with an immediately-invoked
     * function expression (IIFE).
     *
     * If you intend to create a global `const` or `let` variable or a global `class` declaration, to be used from
     * other scripts, be aware that there are certain differences when compared to the traditional methods, which are
     * `var` declarations and assigning to a property of the global `window` object:
     *   - lexically declared variables cannot be conditionally created. A script cannot check for the existence of a
     *     variable and then create a new one. `var` variables are also always created, but re-declarations do not
     *     cause runtime exceptions
     *   - lexically declared variables do not create properties on the global object, which is what a consuming script
     *     might expect
     *   - lexically declared variables are shadowing properties of the global object, which might produce errors if a
     *     consuming script is using both the variable and the property
     *   - lexically declared variables can produce a permanent Temporal Dead Zone (TDZ) if the initialization throws
     *     an exception. Even the `typeof` check is not safe from TDZ reference exceptions
     */
    'no-implicit-globals': 'off',

    /**
     * This rule aims to eliminate implied `eval()` through the use of `setTimeout()`, `setInterval()`, or
     * `execScript()`. As such, it will warn when either function is used with a string as the first argument.
     */
    'no-implied-eval': 'error',

    /**
     * This rule aims to flag usage of `this` keywords outside of classes or class-like objects.
     *
     * Basically, this rule checks whether or not a function containing `this` keyword is a constructor or a method.
     *
     * This rule judges from following conditions whether or not the function is a constructor:
     *   - the name of the function starts with uppercase
     *   - the function is assigned to a variable which starts with an uppercase letter
     *   - the function is a constructor of ES2015 Classes
     *
     * This rule judges from following conditions whether or not the function is a method:
     *   - the function is on an object literal
     *   - the function is assigned to a property
     *   - the function is a method/getter/setter of ES2015 Classes (excepts static methods)
     *
     * And this rule allows this keywords in functions below:
     *   - the `call/apply/bind` method of the function is called directly
     *   - the function is a callback of array methods (such as `.forEach()`) if `thisArg` is given
     *   - the function has `@this` tag in its JSDoc comment
     *   - otherwise are considered problems
     *
     * This rule applies only in strict mode. With `"parserOptions": { "sourceType": "module" }` in the ESLint
     * configuration, your code is in strict mode even without a `"use strict"` directive.
     *
     * @property {object} options
     *                            - `capIsConstructor` {bool} Assume a function which name starts with an uppercase is
     *                                                        a constructor;
     *                                                        default: true
     */
    'no-invalid-this': 'off',

    /**
     * This rule is aimed at preventing errors that may arise from using the `__iterator__` property, which is not
     * implemented in several browsers. As such, it will warn whenever it encounters the `__iterator__` property.
     */
    'no-iterator': 'error',

    /**
     * This rule aims to eliminate the use of labeled statements in JavaScript. It will warn whenever a labeled
     * statement is encountered and whenever `break` or `continue` are used with a label.
     *
     * @property {object} options
     *                            - `allowLoop`   {bool} Ignore labels which are sticking to loop statements;
     *                                                   default: false
     *                            - `allowSwitch` {bool} Ignore labels which are sticking to switch statements;
     *                                                   default: false
     */
    'no-labels': [
        'error',
        {
            'allowLoop': false,
            'allowSwitch': false,
        },
    ],

    /**
     * This rule aims to eliminate unnecessary and potentially confusing blocks at the top level of a script or within
     * other blocks.
     */
    'no-lone-blocks': 'error',

    /**
     * This error is raised to highlight a piece of code that may not work as you expect it to and could also indicate
     * a misunderstanding of how the language works. Your code may run without any problems if you do not fix this
     * error, but in some situations it could behave unexpectedly.
     *
     * This rule disallows any function within a loop that contains unsafe references (e.g. to modified variables from
     * the outer scope).
     */
    'no-loop-func': 'off',

    /**
     * This rule aims to make code more readable and refactoring easier by ensuring that special numbers are declared
     * as constants to make their meaning explicit.
     *
     * @property {object} options
     *                            - `ignore`             {array} An array of numbers to ignore;
     *                                                           default: []
     *                            - `ignoreArrayIndexes` {bool}  Specifies if numbers used as array indexes are considered okay;
     *                                                           default: false
     *                            - `enforceConst`       {bool}  Specifies if we should check for the const keyword in variable declaration of numbers;
     *                                                           default: false
     *                            - detectObjects`       {bool}  Specifies if we should detect numbers when setting object properties for example;
     *                                                           default: false
     */
    'no-magic-numbers': 'off',

    /**
     * This rule aims to disallow multiple whitespace around logical expressions, conditional expressions,
     * declarations, array elements, object properties, sequences and function parameters.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreEOLComments` {bool}   Ignore multiple spaces before comments that occur at
     *                                                           the end of lines;
     *                                                           default: false
     *                            - `exceptions`        {object} specifies nodes to ignore;
     *                                                           default: `{ "Property": true }
     */
    'no-multi-spaces': [
        'error',
        {
            'ignoreEOLComments': false,
            'exceptions': {
                'Property': true,
            },
        },
    ],

    /**
     * This rule is aimed at preventing the use of multiline strings.
     */
    'no-multi-str': 'error',

    /**
     * This rule is aimed at maintaining consistency and convention by disallowing constructor calls using the new
     * keyword that do not assign the resulting object to a variable.
     */
    'no-new': 'error',

    /**
     * This error is raised to highlight the use of a bad practice. By passing a string to the Function constructor,
     * you are requiring the engine to parse that string much in the way it has to when you call the `eval` function.
     */
    'no-new-func': 'error',

    /**
     * This rule aims to eliminate the use of `String`, `Number`, and `Boolean` with the `new` operator. As such, it
     * warns whenever it sees `new String`, `new Number`, or `new Boolean`.
     */
    'no-new-wrappers': 'error',

    /**
     * The rule disallows octal literals.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-octal': 'error',

    /**
     * This rule disallows octal escape sequences in string literals.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-octal-escape': 'error',

    /**
     * This rule aims to prevent unintended behavior caused by modification or reassignment of function parameters.
     *
     * @property {object} options
     *                            - `props`                               {bool}  Warn against the modification of
     *                                                                            parameter properties;
     *                                                                            default: false
     *                            - `ignorePropertyModificationsFor`      {array} Allow modification of properties for
     *                                                                            specific parameters;
     *                                                                            default: []
     *                            - `ignorePropertyModificationsForRegex` {array} Allow modification of properties for
     *                                                                            parameters that match a regular
     *                                                                            expression string;
     *                                                                            default: []
     */
    'no-param-reassign': 'off',

    /**
     * When an object is created with the `new` operator, `__proto__` is set to the original "prototype" property of
     * the object's constructor function. `Object.getPrototypeOf` is the preferred method of getting the object's
     * prototype. To change an object's prototype, use `Object.setPrototypeOf`.
     */
    'no-proto': 'error',

    /**
     * This rule is aimed at eliminating variables that have multiple declarations in the same scope.
     *
     * @property {object} options
     *                            - `builtinGlobals` {bool} Check for redeclaration of built-in globals in global
     *                                                      scope;
     *                                                      default: true
     */
    'no-redeclare': [
        'error',
        {
            'builtinGlobals': false,
        },
    ],

    /**
     * This rule looks for accessing a given property key on a given object name, either when reading the property's
     * value or invoking it as a function. You may specify an optional message to indicate an alternative API or a
     * reason for the restriction.
     *
     * @property {object} options This rule takes a list of objects, where the object name and property names are
     *                            specified
     */
    'no-restricted-properties': 'off',

    /**
     * This rule aims to eliminate assignments from `return` statements. As such, it will warn whenever an assignment
     * is found as part of `return`.
     *
     * @property {string} options
     *                            - `except-parens` Disallow assignments unless they are enclosed in parentheses
     *                            - `always`        Disallow all assignments in return statements
     *                            default: `except-parens`
     */
    'no-return-assign': [
        'error',
        'except-parens',
    ],

    /**
     * This rule aims to prevent a likely common performance hazard due to a lack of understanding of the semantics of
     * `async function`.
     */
    'no-return-await': 'error',

    /**
     * This rule disallows the use of `javascript:` URLs.
     */
    'no-script-url': 'off',

    /**
     * This rule is aimed at eliminating self assignments.
     *
     * @property {object} options
     *                            - `props` {bool} Warns self-assignments of properties;
     *                                             default: true
     */
    'no-self-assign': [
        'error',
        {
            'props': true,
        },
    ],

    /**
     * This error is raised to highlight a potentially confusing and potentially pointless piece of code. There are
     * almost no situations in which you would need to compare something to itself.
     */
    'no-self-compare': 'error',

    /**
     * This rule forbids the use of the comma operator, with the following exceptions:
     *
     *   - in the initialization or update portions of a for statement
     *   - if the expression sequence is explicitly wrapped in parentheses
     */
    'no-sequences': 'error',

    /**
     * This rule is aimed at maintaining consistency when throwing exception by disallowing to throw literals and other
     * expressions which cannot possibly be an `Error` object.
     */
    'no-throw-literal': 'error',

    /**
     * This rule finds references which are inside of loop conditions, then checks the variables of those references
     * are modified in the loop.
     *
     * If a reference is inside of a binary expression or a ternary expression, this rule checks the result of the
     * expression instead. If a reference is inside of a dynamic expression (e.g.: `CallExpression`, `YieldExpression`,
     * ...), this rule ignores it.
     */
    'no-unmodified-loop-condition': 'error',

    /**
     * This rule aims to eliminate unused expressions which have no effect on the state of the program.
     *
     * This rule does not apply to function calls or constructor calls with the `new` operator, because they could have
     * side effects on the state of the program.
     *
     * @property {object} options
     *                            - `allowShortCircuit`    {bool} Allows short circuit evaluations in expressions;
     *                                                            default: false
     *                            - `allowTernary`         {bool} Enables the use of ternary operators in expression
     *                                                            similarly to short circuit evaluations;
     *                                                            default: false
     *                            - `allowTaggedTemplates` {bool} Enables the use of tagged template literals in
     *                                                            expressions;
     *                                                            default: false
     */
    'no-unused-expressions': [
        'error',
        {
            'allowShortCircuit': true,
            'allowTernary': true,
            'allowTaggedTemplates': true,
        },
    ],

    /**
     * This rule is aimed at eliminating unused labels.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-unused-labels': 'error',

    /**
     * This rule is aimed to flag usage of `Function.prototype.call()` and `Function.prototype.apply()` that can be
     * replaced with the normal function invocation.
     */
    'no-useless-call': 'error',

    /**
     * This rule reports `catch` clauses that only `throw` the caught error.
     */
    'no-useless-catch': 'error',

    /**
     * This rule aims to flag the concatenation of 2 literals when they could be combined into a single literal.
     * Literals can be strings or template literals.
     */
    'no-useless-concat': 'off',

    /**
     * This rule flags escapes that can be safely removed without changing behavior.
     */
    'no-useless-escape': 'error',

    /**
     * This rule aims to report redundant `return` statements.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-useless-return': 'error',

    /**
     * This rule aims to eliminate use of void operator.
     */
    'no-void': 'error',

    /**
     * This rule reports comments that include any of the predefined terms specified in its configuration.
     *
     * @property {object} options
     *                            - `terms`    {array}  Terms to match;
     *                                                  default: ['todo', 'fixme', 'xxx']
     *                            - 'location` {string} Configures where in comments to check for matches;
     *                                                  default: `start`
     */
    'no-warning-comments': 'off',

    /**
     * This rule disallows `with` statements.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-with': 'error',

    /**
     * This rule is aimed at using named capture groups instead of numbered capture groups in regular expressions.
     */
    'prefer-named-capture-group': 'off',

    /**
     * This rule aims to ensure that Promises are only rejected with `Error` objects.
     *
     * @property {object} options
     *                            - `allowEmptyReject` {bool} Allows calls to `Promise.reject()` with no arguments;
     *                                                        default: false
     */
    'prefer-promise-reject-errors': 'error',

    /**
     * This rule disallows the use of the `RegExp` constructor function with string literals as its arguments.
     *
     * This rule also disallows the use of the `RegExp` constructor function with template literals without expressions
     * and `String.raw` tagged template literals without expressions.
     *
     * The rule does not disallow all use of the `RegExp` constructor. It should be still used for dynamically
     * generated regular expressions.
     */
    'prefer-regex-literals': 'off',

    /**
     * This rule is aimed at preventing the unintended conversion of a string to a number of a different base than
     * intended or at preventing the redundant `10` radix if targeting modern environments only.
     *
     * @property {string} options
     *                            - `always`    Enforces providing a radix
     *                            - `as-needed` Disallows providing the `10` radix
     *                            default: `always`
     */
    'radix': 'off',

    /**
     * This rule warns async functions which have no await expression.
     */
    'require-await': 'off',

    /**
     * This rule aims to enforce the use of `u` flag on regular expressions.
     */
    'require-unicode-regexp': 'off',

    /**
     * This rule aims to keep all variable declarations in the leading series of statements. Allowing multiple
     * declarations helps promote maintainability and is thus allowed.
     */
    'vars-on-top': 'warn',

    /**
     * This rule requires all immediately-invoked function expressions to be wrapped in parentheses.
     *
     * @property {string} wrapping
     *                             - `outside` Enforces always wrapping the `call` expression
     *                             - `inside`  Enforces always wrapping the `function` expression
     *                             - `any`     Enforces always wrapping, but allows either style
     *                             default: `outside`
     * @property {object} methods
     *                             - `functionPrototypeMethods` {bool} Enforces wrapping expression invoked using
     *                                                                 `.call` and `.apply`;
     *                                                                 default: false
     */
    'wrap-iife': [
        'error',
        'any',
        {
            'functionPrototypeMethods': true,
        },
    ],

    /**
     * This rule aims to enforce consistent style of conditions which compare a variable to a literal value.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} useYoda
     *                               - `never`  Comparisons must never be Yoda conditions
     *                               - `always` Literal value must always come first
     *                               default: `never`
     * @property {object} exceptions The `never` option can have exception options in an object literal
     *                               - `exceptRange`  {bool} Allows Yoda conditions in range comparisons which are
     *                                                       wrapped directly in parentheses, including the parentheses
     *                                                       of an `if` or `while` condition;
     *                                                       default: false
     *                               - `onlyEquality` {bool} Report Yoda conditions only for the equality operators
     *                                                       `==` and `===`;
     *                                                       default: false
     */
    'yoda': [
        'error',
        'never',
    ],
};

/**
 * These rules relate to strict mode directives.
 *
 * @type {object}
 */
let ESLintStrictMode = {
    /**
     * This rule requires or disallows strict mode directives.
     *
     * This rule disallows strict mode directives, no matter which option is specified, if ESLint configuration
     * specifies either of the following as parser options:
     *   - `"sourceType": "module"` that is, files are ECMAScript modules
     *   - `"impliedStrict": true` property in the `ecmaFeatures` object
     *
     * This rule disallows strict mode directives, no matter which option is specified, in functions with non-simple
     * parameter lists (for example, parameter lists with default parameter values) because that is a syntax error in
     * ECMAScript 2016 and later. See the examples of the function option.
     *
     * The `--fix` option on the command line does not insert new "use strict" statements, but only removes unneeded
     * statements.
     *
     * @property {string} option
     *                           - `safe`     Corresponds either of the following options:
     *                                        - `global`   If ESLint considers a file to be a CommonJS module
     *                                        - `function` Otherwise
     *                           - `global`   Requires one strict mode directive in the global scope (and disallows any
     *                                        other strict mode directives)
     *                           - `function` Requires one strict mode directive in each top-level function declaration
     *                                        or expression (and disallows any other strict mode directives)
     *                           - `never`    Disallows strict mode directives
     *                           default: `safe`
     */
    'strict': 'off',
};

/**
 * These rules relate to variable declarations.
 *
 * @type {object}
 */
let ESLintVariables = {
    /**
     * This rule is aimed at enforcing or eliminating variable initializations during declaration.
     *
     * @property {string} initDeclaration
     *                                    - `always` Enforce initialization at declaration
     *                                    - `never`  Disallow initialization during declaration
     *                                    default: `always`
     * @property {object} exceptions
     *                                    - `ignoreForLoopInit` {bool} Initialization at declaration is allowed for
     *                                                                 loops when `never` is set
     */
    'init-declarations': 'off',

    /**
     * This rule disallows the use of the delete operator on variables.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-delete-var': 'error',

    /**
     * This rule aims to create clearer code by disallowing the bad practice of creating a label that shares a name
     * with a variable that is in scope.
     */
    'no-label-var': 'off',

    /**
     * This rule allows you to specify global variable names that you don't want to use in your application.
     *
     * @property {string|object} This rule takes a list of strings, where each string is a global to be restricted, or
     *                           objects, where the global name and the optional custom message are specified
     */
    'no-restricted-globals': 'off',

    /**
     * This rule aims to eliminate shadowed variable declarations.
     *
     * @property {object} options
     *                            - `builtinGlobals` {bool}   Prevents shadowing of built-in global variables: e.g.:
     *                                                        `Object`, `Array`, `Number`, etc.;
     *                                                        default: false
     *                            - `hoist`          {string}
     *                                                        - `functions` Reports shadowing before the outer
     *                                                                      functions are defined
     *                                                        - `all`       Reports all shadowing before the outer
     *                                                                      variables/functions are defined
     *                                                        - `never`     Never report shadowing before the outer
     *                                                                      variables/functions are defined
     *                                                        default: `functions`
     *                            - `allow`          {array}  Identifier names for which shadowing is allowed;
     *                                                        default: []
     */
    'no-shadow': 'off',

    /**
     * This rule disallows identifiers from shadowing restricted names.
     */
    'no-shadow-restricted-names': 'error',

    /**
     * Any reference to an undeclared variable causes a warning, unless the variable is explicitly mentioned in a
     * global comment, or specified in the `globals` key in the configuration file. A common use case for these is if
     * you intentionally use globals that are defined elsewhere (e.g.: in a script sourced from HTML).
     *
     * Note that this rule does not disallow assignments to read-only global variables. See no-global-assign if you
     * also want to disallow those assignments.
     *
     * This rule also does not disallow re-declarations of global variables. See no-redeclare if you also want to
     * disallow those re-declarations.
     *
     * @property {object} options
     *                            - `typeof` {bool} Warn for variables used inside `typeof` check;
     *                                              default: false
     */
    'no-undef': [
        'error',
        {
            'typeof': false,
        },
    ],

    /**
     * This rule aims to eliminate variable declarations that initialize to undefined.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-undef-init': 'error',

    /**
     * This rule aims to eliminate the use of `undefined`, and as such, generates a warning whenever it is used.
     */
    'no-undefined': 'off',

    /**
     * This rule is aimed at eliminating unused variables, functions, and function parameters.
     *
     * A variable `foo` is considered to be used if any of the following are true:
     *   - it is called `(foo())` or constructed `(new foo())`
     *   - it is read (`var bar = foo`)
     *   - it is passed into a function as an argument (`doSomething(foo)`)
     *   - it is read inside of a function that is passed to another function (`doSomething(function() { foo(); })`)
     *
     * A variable is not considered to be used if it is only ever declared (`var foo = 5`) or assigned to (`foo = 7`).
     *
     * @property {string|object} options This rule takes one argument which can be a string or an object. The string
     *                                   settings are the same as those of the `vars` property (explained below)
     *                                   - `vars`                      {string}
     *                                                                          - `all`   Checks all variables for
     *                                                                                    usage, including those in the
     *                                                                                    global scope
     *                                                                          - `local` Checks only that locally-
     *                                                                                    declared variables are used,
     *                                                                                    but will allow global
     *                                                                                    variables to be used
     *                                                                          default: `all`
     *                                   - `varsIgnorePattern`         {string} Specifies exceptions not to check for
     *                                                                          usage: variables whose names match a
     *                                                                          regexp pattern
     *                                   - `args`                      {string}
     *                                                                          - `after-used` Unused positional
     *                                                                                         arguments that occur
     *                                                                                         before the last used
     *                                                                                         argument will not be
     *                                                                                         checked, but all named
     *                                                                                         arguments and all
     *                                                                                         positional arguments
     *                                                                                         after the last used
     *                                                                                         argument will be checked
     *                                                                          - `all`        All named arguments must
     *                                                                                         be used
     *                                                                          - `none`       Do not check arguments
     *                                   - `ignoreRestSiblings`        {bool}   Specifies exceptions not to check for
     *                                                                          usage: arguments whose names match a
     *                                                                          regexp pattern
     *                                   - `caughtErrors`              {string} Used for `catch` block arguments
     *                                                                          validation
     *                                                                          - `none` Do not check error objects
     *                                                                          - `all`  All named arguments must be
     *                                                                                   used
     *                                                                          default: `none`
     *                                   - `caughtErrorsIgnorePattern` {string} Specifies exceptions not to check for
     *                                                                          usage: catch arguments whose names
     *                                                                          match a regexp pattern
     */
    'no-unused-vars': [
        'error',
        {
            'vars': 'all',
            'args': 'none',
            'ignoreRestSiblings': true,
        },
    ],

    /**
     * This rule will warn when it encounters a reference to an identifier that has not yet been declared.
     *
     * @property {object} options
     *                            - `functions` {bool} Warns of every reference to a function before the function
     *                                                 declaration;
     *                                                 default: true
     *                            - `classes`   {bool} Warns of every reference to a class before the class
     *                                                 declaration;
     *                                                 default: true
     *                            - `variables` {bool} Warns of every reference to a variable before the variable
     *                                                 declaration;
     *                                                 default: true
     */
    'no-use-before-define': [
        'error',
        {
            'functions': false,
            'classes': false,
            'variables': false,
        },
    ],
};

/**
 * These rules relate to code running in Node.js, or in browsers with CommonJS.
 *
 * @type {object}
 */
let ESLintNodeJsAndCommonJs = {
    /**
     * This rule is aimed at ensuring that callbacks used outside of the main function block are always part-of or
     * immediately preceding a `return` statement. This rule decides what is a callback based on the name of the
     * function being called.
     *
     * @property {array} possibleCallbackNames List of possible callback names which may include object methods;
     *                                         default: ['callback', 'cb', 'next']
     */
    'callback-return': 'off',

    /**
     * This rule requires all calls to `require()` to be at the top level of the module, similar to ES6 `import` and
     * `export` statements, which also can occur only at the top level.
     */
    'global-require': 'off',

    /**
     * This rule expects that when you're using the callback pattern in Node.js you'll handle the error.
     *
     * @property {string} errorParameter The name of the error parameter;
     *                                   default: `err`
     */
    'handle-callback-err': [
        'error',
        '^(err|error)$',
    ],

    /**
     * This rule disallows calling and constructing the `Buffer()` constructor.
     */
    'no-buffer-constructor': 'off',

    /**
     * When this rule is enabled, each `var` statement must satisfy the following conditions:
     *   - either none or all variable declarations must be require declarations (default)
     *   - all `require` declarations must be of the same type (grouping)
     *
     * This rule distinguishes between six kinds of variable declaration types:
     *   - `core`: declaration of a required core module
     *   - `file`: declaration of a required file module
     *   - `module`: declaration of a required module from the node_modules folder
     *   - `computed`: declaration of a required module whose type could not be determined (either because it is
     *     computed or because require was called without an argument)
     *   - `uninitialized`: a declaration that is not initialized
     *   - `other`: any other kind of declaration
     *
     * @property {object} options
     *                            - `grouping`  All `require` declarations must be of the same type;
     *                                          default: false
     *                            - `allowCall` Allow modules to be called from `require` declarations(?);
     *                                          default: false
     */
    'no-mixed-requires': 'off',

    /**
     * This rule aims to eliminate use of the `new require` expression.
     */
    'no-new-require': 'error',

    /**
     * This rule aims to prevent string concatenation of directory paths in Node.js.
     */
    'no-path-concat': 'error',

    /**
     * This rule is aimed at discouraging use of `process.env` to avoid global dependencies. As such, it will warn
     * whenever `process.env` is used.
     */
    'no-process-env': 'off',

    /**
     * This rule aims to prevent the use of `process.exit()` in Node.js JavaScript. As such, it warns whenever
     * `process.exit()` is found in code.
     */
    'no-process-exit': 'off',

    /**
     * This rule allows you to specify modules that you don’t want to use in your application.
     *
     * @property {strings|objects} The names of restricted modules
     */
    'no-restricted-modules': 'off',

    /**
     * This rule is aimed at preventing synchronous methods from being called in Node.js. It looks specifically for the
     * method suffix "`Sync`" (as is the convention with Node.js operations).
     *
     * @property {object} options
     *                            - `allowAtRootLevel` {bool} Determines whether synchronous methods should be allowed
     *                                                        at the top level of a file, outside of any functions;
     *                                                        default: false
     */
    'no-sync': 'off',
};

/**
 * Merge rule objects into a single object.
 *
 * @type {object}
 */
let rules = Object.assign(
    ESLintPossibleErrors,
    ESLintBestPractices,
    ESLintStrictMode,
    ESLintVariables,
    ESLintNodeJsAndCommonJs,
);

/**
 * @type {object}
 */
module.exports = {
    env: {
        browser: true,
        es6: true,
        node: true,
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
