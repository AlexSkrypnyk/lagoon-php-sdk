<?php

namespace Lagoon\Mutation\User;

use Lagoon\LagoonQueryBase;

/**
 * Add a project using the graphql api.
 */
class AddUserToProject extends LagoonQueryBase {

  /**
   * {@inheritdoc}
   */
  protected function expectedKeys(array $variables = []) {
    return [
      'group',
      'email',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function query() {
    return <<<QUERY
mutation AddUserToProject(
  \$group: String!
  \$email: String!
) {
  addUserToGroup (input: {
    user: {
      email: \$email
    }
    group: {
      name: \$group
    }
    role: MAINTAINER
  }
  ) {
    %s
  }
}
QUERY;
  }
}
