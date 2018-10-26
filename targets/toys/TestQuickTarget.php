<?hh
/*
 *  Copyright (c) 2019-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

final class TestQuickTarget extends PerfTarget {
  public function getSanityCheckPath(): string {
    return '/quick/boxed_static_string.php';
  }

  public function getSanityCheckString(): string {
    return 'Num: ';
  }
  public function getSourceRoot(): string {
    return __DIR__;
  }
}
